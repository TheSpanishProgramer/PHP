<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    public function index()
    {
    	$teachers = Teacher::all();
    	return view('teachers.index')->with(compact('teachers'));
    }
    public function store(Request $request)
    {

    	
        //obenemos la extension del archivo
        $extension = $request->file('photo')->getClientOriginalExtension();  
		
        //guardamos en la bd
        $teachers = new Teacher();
        $teachers->name = $request->input('name');
        $teachers->lastName = $request->input('lastName');
        $teachers->dni = $request->input('dni');
        $teachers->address = $request->input('address');
        $teachers->birthdate = $request->input('birthdate');
        $teachers->sex = $request->input('sex');
        $teachers->email = $request->input('email');
        $teachers->phone = $request->input('phone');
        $teachers->photo = $extension;
        $teachers->save();

        //obenemos el id del registro
        $id = $teachers->id;

        //generamos el nombre del archivo (id+extension)
        $file_name = $id.'.'.$extension;    

        //ajustamos y guardamos la imagen en la ruta especificada
        Image::make($request->file('photo'))
               ->resize(250,250)
               ->save('images/teachers/'. $file_name);

        return back()->with('notification','Usuario registrado exitosamente');
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $teachers = Teacher::find($id);

        if($request->file('photo')){

            $extension = $request->file('photo')->getClientOriginalExtension(); 
            //guardamos en la bd
            $teachers->photo = $extension;
            //generamos el nombre del archivo (id+extension)
            $file_name = $id.'.'.$extension;    

            //ajustamos y guardamos la imagen en la ruta especificada
            Image::make($request->file('photo'))
                   ->resize(250,250)
                   ->save('images/teachers/'. $file_name);
        }
        //guardamos en la bd
        $teachers->name = $request->input('name');
        $teachers->lastName = $request->input('lastName');
        $teachers->dni = $request->input('dni');
        $teachers->address = $request->input('address');
        $teachers->birthdate = $request->input('birthdate');
        $teachers->sex = $request->input('sex');
        $teachers->email = $request->input('email');
        $teachers->phone = $request->input('phone');
        $teachers->save();

        return back();
    }
    public function delete($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return back();
    }
}
