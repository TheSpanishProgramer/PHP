<?php

namespace App\Http\Controllers;

use App\Note;
use App\Student;
use Illuminate\Http\Request;

class NotesController extends Controller
{

    public function index()
    {
        $all_students = Student::all();
        $students = collect();
        foreach ($all_students as $student) {
            if ($student->average_note != '-')
                $students->push($student);
        }
        // dd($students);
        return view('notes.index')->with(compact('students'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $values = $request->input('notes');
        $courses_id = $request->input('courses');

        $note = null;

        for ($i=0; $i<count($courses_id); ++$i) {
            $note = Note::create([
                'student_id' => $request->input('student_id'),
                'course_id' => $courses_id[$i],
                'type' => $request->input('type'),
                'value' => $values[$i]
            ]);
        }

        if ($note)
            $notification = 'Las notas se han registrado correctamente.';
        else
            $notification = 'Ha ocurrido un error inesperado.';

        return back()->with('notification', $notification);
    }
}
