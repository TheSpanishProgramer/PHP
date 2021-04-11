<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function index()
    {
    	$students = Student::all();
    	return view('students.index')->with(compact('students'));
    }

    public function store(Request $request)
    {    	
        //obenemos la extension del archivo
        $extension = $request->file('photo')->getClientOriginalExtension();  
		
        //guardamos en la bd
        $students = new Student();
        $students->name = $request->input('name');
        $students->lastName = $request->input('lastName');
        $students->dni = $request->input('dni');
        $students->address = $request->input('address');
        $students->birthdate = $request->input('birthdate');
        $students->sex = $request->input('sex');
        $students->email = $request->input('email');
        $students->phone = $request->input('phone');
        $students->attorney = $request->input('attorney');
        $students->photo = $extension;
        $students->save();

        //obenemos el id del registro
        $id = $students->id;

        //generamos el nombre del archivo (id+extension)
        $file_name = $id.'.'.$extension;    

        //ajustamos y guardamos la imagen en la ruta especificada
        Image::make($request->file('photo'))
               ->resize(250,250)
               ->save('images/students/'. $file_name);

        // Timer log
        $message  = 'El usuario ' . auth()->user()->name;
        $message .= ' ha finalizado el registro del alumno ' . $students->name . ' ' . $students->lastName;
        $message .= ' satisfactoriamente en ' . $request->input('input_timer') . ' !';
        Log::info($message);

        return back()->with('notification','Usuario registrado exitosamente');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $students = Student::find($id);

        if($request->file('photo')){

            $extension = $request->file('photo')->getClientOriginalExtension(); 
            //guardamos en la bd
            $students->photo = $extension;
            //generamos el nombre del archivo (id+extension)
            $file_name = $id.'.'.$extension;    

            //ajustamos y guardamos la imagen en la ruta especificada
            Image::make($request->file('photo'))
                   ->resize(250,250)
                   ->save('images/students/'. $file_name);
        }

        //guardamos en la bd
        $students->name = $request->input('name');
        $students->lastName = $request->input('lastName');
        $students->dni = $request->input('dni');
        $students->address = $request->input('address');
        $students->birthdate = $request->input('birthdate');
        $students->sex = $request->input('sex');
        $students->email = $request->input('email');
        $students->phone = $request->input('phone');
        $students->attorney = $request->input('attorney');
        $students->save();

        return back();
    }

    public function delete($id)
    {
        $students = Student::find($id);
        $students->delete();
        return back();
    }
    
}
