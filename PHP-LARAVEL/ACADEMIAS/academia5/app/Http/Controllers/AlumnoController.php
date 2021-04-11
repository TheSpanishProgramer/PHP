<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Modulo;
use App\Http\Requests\AlumnoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modulos = Modulo::get('nombre');
        $alumnos = Alumno::orderBy('apellidos')
            ->paginate(4);
        return view('alumnos.index', compact('alumnos', 'modulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        $datos = $request->validated();
        //cojo los datos por que voy a modificar el request, voy a poner nom y ape la primera letra en mayuscula
        $alumno = new Alumno();
        $alumno->nombre = ucwords($datos['nombre']);
        $alumno->apellidos = ucwords($datos['apellidos']);
        $alumno->mail = $datos['mail'];

        //comprobamos si hemos subido un logo
        if (isset($datos['logo']) && $datos['logo'] != null) {
            $file = $datos['logo'];
            $nom = 'logo/' . time() . '_' . $file->getClientOriginalName();
            //guardamos el fichero en public
            Storage::disk('public')->put($nom, \File::get($file));
            //le damos a alumno el nombre que le hemos puesto al fichero
            $alumno->logo = "img/$nom";
            //guardamos el alumno
        }
        $alumno->save();
        return redirect()->route('alumnos.index')->with('mensaje', 'Alumno guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.detalle', compact('alumno'));
    }

    public function fmatricula(Alumno $alumno)
    {
        $modulos2 = $alumno->modulosOut();
        //Compruebo si ya los tiene todos
        if ($modulos2->count() == 0) {
            return redirect()->route('alumnos.show', $alumno)->with('mensaje', 'Este alumno ya está matriculado en todos los modulos');
        }
        //Cargamos el formulario matricular alumno le mando el alumno y los modulos que le faltan
        return view('alumnos.fmatricula', compact('alumno', 'modulos2'));
    }

    public function matricular(Request $request)
    {
        $id = $request->alumno_id;
        //Me traigo el alumno de codigo id
        $alumno = Alumno::find($id);
        if (isset($request->modulo_id)) {
            foreach ($request->modulo_id as $item) {
                $alumno->modulos()->attach($item);
            }
            return redirect()->route('alumnos.show', $alumno)->with('mensaje', 'Alumno matriculado con éxito');
        }
        return redirect()->route('alumnos.show', $alumno)->with('mensaje', 'Ningun modulo seleccionado');
    }

    public function fcalificar(Alumno $alumno)
    {
        $modulos = $alumno->modulos()->get();
        if ($modulos->count() == 0) {
            return redirect()->route('alumnos.show', $alumno)->with('mensaje', 'El alumno no cursa ningun módulo');
        }
        return view('alumnos.fcalificar', compact('alumno'));
    }

    public function calificar(Request $request)
    {
        $alumno = Alumno::find($request->id_al);
        //recorro el array asociativo con los id modulos y las notas
        foreach ($request->modulos as $k => $v) {
            $alumno->modulos()->updateExistingPivot($k, ['nota' => $v]);
        }
        return redirect()->route('alumnos.show', $alumno)->with('mensaje', 'Calificaciones guardadas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'mail' => ['required', 'unique:alumnos,mail,' . $alumno->id]
        ]);

        $alumno->nombre = ucwords($request->nombre);
        $alumno->apellidos = ucwords($request->apellidos);
        $alumno->mail = $request->mail;

        if ($request->has('logo')) {
            $request->validate([
                'logo' => ['image']
            ]);
            $file = $request->file('logo');
            $nom = 'logo/' . time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put($nom, \File::get($file));
            $imagenOld = $alumno->logo;
            if (basename($imagenOld) != 'default.jpg') {
                unlink($imagenOld);
            }
            $alumno->logo = "img/$nom";
        }
        $alumno->update();
        return redirect()->route('alumnos.index')->with('mensaje', 'Alumno actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //tener cuidado de borrar las imagenes salvo default.jpg
        $logo = $alumno->logo;
        if (basename($logo) != 'default.jpg') {
            unlink($logo);
        }
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('mensaje', 'Alumno borrado');
    }
}
