<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Asignatura;

use App\http\Requests\CreateAsignaturaRequest;
use App\http\Requests\UpdateAsignaturaRequest;

class AsignaturaController extends Controller
{
    public function index(Request $request)
    {

            $asignaturas = Asignatura::name($request->get('name'))->orderBy('id','desc')->paginate(10);
        
            return view('asignaturas.index')->withAsignaturas($asignaturas);
        
	}

	 public function create()
    {

        return view('asignaturas.create');
    }

    public function store(CreateAsignaturaRequest $request)
    {

        $asignatura = new Asignatura;
        $asignatura->name = $request->input('name');
        $asignatura->precio = $request->input('precio');
        $asignatura->save();

        if($asignatura->save()){

            return redirect()->route('asignaturas.index')->with('status', "Asignatura $asignatura->name creada");
        } else {
            return redirect()->back()->with('status', 'No se ha podido crear la Asignatura');
        }
    }

    public function edit($id)
    {

        $asignatura = Asignatura::findOrFail($id);
        return view('asignaturas.edit')->withAsignatura($asignatura);
    }



    public function update(UpdateAsignaturaRequest $request, $id)
    {

    	
        $asignatura = Asignatura::findOrFail($id);

        $asignatura->name = $request->input('name');
        $asignatura->precio = $request->input('precio');
        $asignatura->save();

        if($asignatura->save()){
            
            return redirect()->route('asignaturas.index')->with('status', "Asignatura $asignatura->name actualizada");
        } else {
            return redirect()->back()->with('status', 'No se ha podido actualizar la Asignatura');
        }

    }


    public function destroy($id)
    {

    	$asignatura = Asignatura::findOrFail($id);
        Asignatura::destroy($id);

        return redirect()->route('asignaturas.index')->with('status', "Asignatura Borrada");
    }
}
