<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    public function index()
    {
    	$courses = Course::all();
    	return view('courses.index')->with(compact('courses'));
    }
    public function store(Request $request)
    {    			

        //guardamos en la bd
        $courses = new Course();
        $courses->name = $request->input('name');
        $courses->description = $request->input('description');
        $courses->save();
        return back()->with('notification','Curso registrado exitosamente');
       // return response()->json(['error' => false, 'message' => 'Curso registradoy correctamente']);
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $courses = Course::find($id);
        $courses->name = $request->input('name');
        $courses->description = $request->input('description');
        $courses->save();

        return back();
    }
    public function delete($id)
    {
        $courses = Course::find($id);
        $courses->delete();
        return back();
    }
}
