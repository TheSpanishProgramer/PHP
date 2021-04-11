<?php

namespace App\Http\Controllers;

use App\Course;
use App\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::all();
        return view('enrollment.index')->with(compact('enrollments'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('enrollment.create')->with(compact('courses'));
    }

    public function store(Request $request)
    {
        $enrollment = Enrollment::create([
            'student_id' => $request->input('student_id'),
            'level' => $request->input('level'),
            'semester' => $request->input('semester'),
            'enrollment_payment' => $request->input('enrollment_payment'),
            'monthly_payment' => $request->input('monthly_payment'),
            'uniform_payment' => $request->input('uniform_payment'),
            'courses' => join(',', $request->input('courses'))
        ]);

        if ($enrollment)
            $notification = 'La matrícula se ha registrado correctamente.';
        else
            $notification = 'Ha ocurrido un error inesperado. Por favor corrija los datos.';

        return back()->with('notification', $notification);
    }
}
