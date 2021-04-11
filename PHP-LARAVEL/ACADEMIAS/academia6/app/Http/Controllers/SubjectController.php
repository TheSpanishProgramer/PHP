<?php

namespace App\Http\Controllers;

use App\Document;
use App\Post;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function show(Subject $subject)
    {
        if (isset(auth()->user()->subjects()->where('subject_id', $subject->id)->get()[0]) || $subject->user_id === auth()->user()->id) {
            return view('subject.show', compact('subject'));
        } else {
            return view('subject.matricula', compact('subject'));
        }
    }

    public function showPost(Subject $subject)
    {
        if (isset(auth()->user()->subjects()->where('subject_id', $subject->id)->get()[0]) || $subject->user_id === auth()->user()->id) {
            $posts = Post::where('subject_id', $subject->id)->latest()->paginate();
            return view('post.index', compact('posts'));
        } else {
            abort(403);
        }
    }

    public function matricular(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'matricula' => 'required|string|max:10'
        ]);

        if (isset(auth()->user()->subjects()->where('subject_id', $request->subject)->get()[0])) {
            return redirect()->back()->with('fail', 'El usuario ya se encuentra matriculado en la asignatura');
        }

        if ($request->matricula === $subject->matricula) {
            $subject->users()->attach(auth()->user()->id);
            $subject->save();
        }

        return redirect()->route('subject', $subject);
    }

    public function edit(Subject $subject)
    {
        $this->authorize('edit', $subject);

        return view('subject.edit', compact('subject'));
    }

    public function desmatricular(Subject $subject, User $user)
    {
        $this->authorize('edit', $subject);

        DB::delete('DELETE FROM subject_user WHERE subject_id = :subject_id AND user_id = :user_id', [':subject_id' => $subject->id, ':user_id' => $user->id]);

        return redirect()->back()->with('success', 'Se ha desmatriculado al usuario correctamente.');
    }
}
