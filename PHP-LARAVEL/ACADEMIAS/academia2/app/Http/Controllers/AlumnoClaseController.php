<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Alumno;
use App\Clase;

use App\http\Requests\AlumnoClaseRequest;

class AlumnoClaseController extends Controller
{
    


    public function update(AlumnoClaseRequest $request, $id)
    {
    	$alumno = Alumno::findOrFail($id);   
        

        if($alumno){
        	
        	$alumno->clases()->attach([$request->input('clase')]);

            return redirect()->back()->with('status', "clase vinculada");
        } else {
            return redirect()->back()->with('status', 'No se ha podido vincular la clase');
        }
    }

    public function destroy($id)
    {
    	$ids = preg_split('/;/', $id);
    	$alumno = Alumno::findOrFail($ids[0]);

        if($alumno){
        	
        	$alumno->clases()->detach($ids[1]);


            return redirect()->back()->with('status', "clase desvinculada");
        } else {
            return redirect()->back()->with('status', 'No se ha podido desvincular la clase');
        }
    }
}
