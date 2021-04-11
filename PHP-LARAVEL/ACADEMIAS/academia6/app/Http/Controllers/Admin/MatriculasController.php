<?php

namespace App\Http\Controllers\Admin;

use App\Subject;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MatriculasController extends Controller
{
    public function matricula()
    {
        $users = User::role('alumno')->get();

        return view('admin.matricula.index', compact('users'));
    }

    public function edit(User $user)
    {
        if (!$user->hasRole('alumno')) {
            return redirect()->route('admin.matricula')->with('fail', 'Solo se pueden matricular a usuarios con el rol alumno');
        }

        // un array con el id de las asignaturas a las que se encuentra matriculado
        $userSubjectsId = array();
        foreach ($user->subjects as $subject) {
            $userSubjectsId[] = $subject->id;
        }

        // devuelve de la base de datos las asignaturas en las que no se encuentra matriculado
        $subjects = Subject::whereNotIn('subjects.id', $userSubjectsId)->get();

        return view('admin.matricula.edit', compact('user', 'subjects'));
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'subject' => 'required|exists:subjects,id'
        ]);

        if (isset($user->subjects()->where('subject_id', $request->subject)->get()[0])) {
            return redirect()->back()->with('fail', 'El usuario ya se encuentra matriculado en la asignatura');
        }

        $user->subjects()->attach($request->subject);
        $user->save();

        return redirect()->back()->with('success', 'Se ha matriculado al usuario');
    }

    public function destroy(User $user, Subject $subject)
    {
        DB::delete('DELETE FROM subject_user WHERE subject_id = :subject_id AND user_id = :user_id', [':subject_id' => $subject->id, ':user_id' => $user->id]);

        return redirect()->back()->with('success', 'Se ha desmatriculado al usuario correctamente.');
    }
}
