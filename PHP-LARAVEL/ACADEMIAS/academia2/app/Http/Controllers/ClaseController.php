<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Clase;
use App\Alumno;
use App\Profesor;
use App\Asignatura;

use App\Http\Requests;

use App\http\Requests\CreateClaseRequest;
use App\http\Requests\UpdateClaseRequest;

class ClaseController extends Controller
{
    public function index(Request $request)
    {

            $clases = Clase::name($request->get('name'))->orderBy('id','desc')->paginate(10);
        
            return view('clases.index')->withClases($clases);
        
	}


    public function show($id)
    {
        $clase = null;
        $clase = Clase::with('alumnos')->where('id',$id)->first();

        $profesor = Profesor::where('id',$clase->profesor_id)->first();
        $alumnos = Alumno::all();
        $asignatura = Asignatura::where('id',$clase->asignatura_id)->first();

        if(is_null($profesor)){
            return back()->with('status', "No existe el profesor ". $id);
        }
        
            return view('clases.show')->withClase($clase)->withAlumnos($alumnos)->withProfesor($profesor)->withAsignatura($asignatura);
    }

	public function create()
    {

        $asignaturas = Asignatura::all();
        $profesores = Profesor::all();
        return view('clases.create')->withAsignaturas($asignaturas)->withProfesores($profesores);
    }

    public function store(CreateClaseRequest $request)
    {

    	$clase = new Clase;
        $clase->name = $request->input('name');
        $clase->numero = $request->input('numero');
        $clase->asignatura_id = $request->input('asignatura');
        $clase->profesor_id = $request->input('profesor');
        $clase->save();

        if($clase->save()){

            return redirect()->route('clases.index')->with('status', "Clase $clase->name creada");
        } else {
            return redirect()->back()->with('status', 'No se ha podido crear la Clase');
        }
    }


    public function edit($id)
    {

        $clase = Clase::findOrFail($id);
        $asignaturas = Asignatura::all();
        $profesores = Profesor::all();
        return view('clases.edit')->withClase($clase)->withAsignaturas($asignaturas)->withProfesores($profesores);
    }

    public function update(UpdateClaseRequest $request, $id)
    {    	
        $clase = Clase::findOrFail($id);

        $clase->name = $request->input('name');
        $clase->numero = $request->input('numero');
        $clase->asignatura_id = $request->input('asignatura');
        $clase->profesor_id = $request->input('profesor');
        $clase->save();

        if($clase->save()){
            
            return redirect()->route('clases.index')->with('status', "Clase $clase->name actualizado");
        } else {
            return redirect()->back()->with('status', 'No se ha podido actualizar los datos de la clase');
        }

    }

         public function destroy($id)
    {
    	$clase = Clase::findOrFail($id);
        Clase::destroy($id);

        return redirect()->route('clases.index')->with('status', "Clase $clase->name Borrado");
    }
}
