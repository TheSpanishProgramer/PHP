<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Profesor;
use App\Clase;

use App\http\Requests\CreateProfesorRequest;
use App\http\Requests\UpdateProfesorRequest;

class ProfesorController extends Controller
{
    public function index(Request $request)
    {

            $profesores = Profesor::name($request->get('name'))->active($request->get('active'))->orderBy('id','desc')->paginate(10);
        
            return view('profesores.index')->withProfesores($profesores);
        
	}

    public function show($id)
    {
        $profesor = null;
        $profesor = Profesor::where('id',$id)->first();

        $clase = Clase::where('profesor_id',$profesor->id)->first();

        if(is_null($profesor)){
            return back()->with('status', "No existe el profesor ". $id);
        }
        
            return view('profesores.show')->withProfesor($profesor)->withClase($clase);
    }

	public function create()
    {

        return view('profesores.create');
    }

    public function store(CreateProfesorRequest $request)
    {

    	$profesor = new Profesor;
        $profesor->name = $request->input('name');
        $profesor->apellidos = $request->input('apellidos');
        $profesor->dni = $request->input('dni');
        $profesor->cp = $request->input('cp');
        $profesor->poblacion = $request->input('poblacion');
        $profesor->provincia = $request->input('provincia');
        $profesor->tfijo = $request->input('tfijo');
        $profesor->movil = $request->input('movil');
        $profesor->active = "1";
        $profesor->save();

        if($profesor->save()){

            return redirect()->route('profesores.index')->with('status', "Profesor/a $profesor->name creado/a");
        } else {
            return redirect()->back()->with('status', 'No se ha podido crear al Profesor/a');
        }
    }


    public function edit($id)
    {

        $profesor = Profesor::findOrFail($id);
        return view('profesores.edit')->withProfesor($profesor);
    }

    public function update(UpdateProfesorRequest $request, $id)
    {    	
        $profesor = Profesor::findOrFail($id);

        $profesor->name = $request->input('name');
        $profesor->apellidos = $request->input('apellidos');
        $profesor->dni = $request->input('dni');
        $profesor->cp = $request->input('cp');
        $profesor->poblacion = $request->input('poblacion');
        $profesor->provincia = $request->input('provincia');
        $profesor->tfijo = $request->input('tfijo');
        $profesor->active = $request->input('active');
        $profesor->save();

        if($profesor->save()){
            
            return redirect()->route('profesores.index')->with('status', "Profesor $profesor->name actualizado");
        } else {
            return redirect()->back()->with('status', 'No se ha podido actualizar los datos del Profesor/a');
        }

    }

         public function destroy($id)
    {
    	$profesor = Profesor::findOrFail($id);
        Profesor::destroy($id);

        return redirect()->route('profesores.index')->with('status', "Profesor/a $profesor->name Borrado");
    }
}
