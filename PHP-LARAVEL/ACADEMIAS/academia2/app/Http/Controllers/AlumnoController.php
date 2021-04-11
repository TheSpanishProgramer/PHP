<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Alumno;
use App\Clase;
use App\Asignatura;

use App\http\Requests\CreateAlumnoRequest;
use App\http\Requests\UpdateAlumnoRequest;

class AlumnoController extends Controller
{
    public function index(Request $request)
    {

            $alumnos = Alumno::name($request->get('name'))->active($request->get('active'))->orderBy('id','desc')->paginate(10);
        
            return view('alumnos.index')->withAlumnos($alumnos);
        
	}

    public function show($id)
    {
        $alumno = null;
        $alumno = Alumno::with('clases')->where('id',$id)->first();

        $clases = Clase::all();
        $asignaturas = Asignatura::all();

        if(is_null($alumno)){
            return back()->with('status', "No existe el alumno ". $id);
        }
        
            return view('alumnos.show')->withAlumno($alumno)->withClases($clases)->withAsignaturas($asignaturas);
    }

	public function create()
    {

        return view('alumnos.create');
    }

    public function store(CreateAlumnoRequest $request)
    {

    	$alumno = new Alumno;
        $alumno->name = $request->input('name');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->dni = $request->input('dni');
        $alumno->cp = $request->input('cp');
        $alumno->poblacion = $request->input('poblacion');
        $alumno->provincia = $request->input('provincia');
        $alumno->tfijo = $request->input('tfijo');
        $alumno->movil = $request->input('movil');
        $alumno->tutor = $request->input('tutor');
        $alumno->active = "1";
        $alumno->save();

        if($alumno->save()){

            return redirect()->route('alumnos.index')->with('status', "Alumno/a $alumno->name creado/a");
        } else {
            return redirect()->back()->with('status', 'No se ha podido crear al Alumno/a');
        }
    }


    public function edit($id)
    {

        $alumno = Alumno::findOrFail($id);
        return view('alumnos.edit')->withAlumno($alumno);
    }

    public function update(UpdateAlumnoRequest $request, $id)
    {    	
        $alumno = Alumno::findOrFail($id);

        $alumno->name = $request->input('name');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->dni = $request->input('dni');
        $alumno->cp = $request->input('cp');
        $alumno->poblacion = $request->input('poblacion');
        $alumno->provincia = $request->input('provincia');
        $alumno->tfijo = $request->input('tfijo');
        $alumno->movil = $request->input('movil');
        $alumno->tutor = $request->input('tutor');
        $alumno->active = $request->input('active');
        $alumno->save();

        if($alumno->save()){
            
            return redirect()->route('alumnos.index')->with('status', "Alumno $alumno->name actualizado");
        } else {
            return redirect()->back()->with('status', 'No se ha podido actualizar los datos del Alumno/a');
        }

    }

    public function add_clase(UpdateAlumnoRequest $request, $id)
    { 
    }




    public function destroy($id)
    {
    	$alumno = Alumno::findOrFail($id);
        Alumno::destroy($id);

        return redirect()->route('alumnos.index')->with('status', "Alumno/a $alumno->name Borrado");
    }

}