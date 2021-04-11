<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Creamos el metodo que se ejecute al acceder al sitio
        $alumnos = Alumno::orderBy('nombre')->paginate(5);
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Que abra la vista create.blade.php
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Llega lo de registrar alumnos y lo validamos con herramientas de Laravel
        $request->validate([
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'email' => ['required', 'unique:alumnos,email'],
            'telefono' => ['nullable'],
        ]);

        //-----NUEVO-------
        $alumno = new Alumno();
        // Sacamos el nombre del request(como un post) y lo ponemos con
        // ucwords y se lo damos a alumno->nombre
        $alumno->nombre = ucwords($request->nombre);
        $alumno->apellidos = ucwords($request->apellidos);
        $alumno->email = $request->email;
        $alumno->telefono = $request->telefono;

        //Vamos con la imagen
        //1. Como no es oblogatorio comprobamos si la hemos subido
        if ($request->has('imagen')) {
            //he subido una imagen
            //Valido que sea un fichero de imagen
            $request->validate([
                'imagen' => ['image']
            ]);
            //Si es un fichero de imagen
            $fileImagen = $request->file('imagen');
            // Creamos una variable con el nombre que le daremos;
            // la ruta, un id unico y el nombre original. Para que no se puedan repetir
            $nombreImagen = "img/alumnos/" . uniqid() . "_" . $fileImagen->getClientOriginalName();
            // Lo movemos a la carpeta publico, pasandole
            // el nombre de la imagen y la ruta pasada por request
            Storage::Disk("public")->put($nombreImagen, \File::get($fileImagen));
            // Lo incluimos en la base de datos
            $alumno->imagen = "storage/" . $nombreImagen;
        }
        // Guardamos todo en la base de datos
        $alumno->save();
        // Volvemos al index pasando un mensaje para evitar quedar con la pagina en blanco
        return redirect()->route('alumnos.index')->with('mensaje', "Alumno Registrado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        // Modificamos el metodo editar para mandar la vista editar.blade.php
        // pasandole un array con los datos del alumno para mostrarlos en la pagina
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //Muy parecido al metodo store
        $request->validate([
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'email' => ['required'],
            'telefono' => ['nullable'],
        ]);

        //No hay que crear un alumno porque se le pasa como parametro
        $alumno->update([
            'nombre' => ucwords($request->nombre),
            'apellidos' => ucwords($request->apellidos),
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        //Vamos con la imagen
        //1. Como no es oblogatorio comprobamos si la hemos subido
        if ($request->has('imagen')) {
            //he subido una imagen
            //Valido que sea un fichero de imagen
            $request->validate([
                'imagen' => ['image']
            ]);
            //Si es un fichero de imagen
            $fileImagen = $request->file('imagen');
            //Le damos un nombre unico que seria
            //la ruta y el nombre de la imagen subida
            $nombreImagen = "img/alumnos/" . uniqid() . "_" . $fileImagen->getClientOriginalName();
            //Comprobamos que si hay una vieja se borra la antigua, solo si no es default.png
            if (basename($alumno->imagen) != 'default.png') {
                unlink($alumno->imagen);
            }
            //La subimos al public pasandole le nombre y la imagen del formulario
            Storage::Disk("public")->put($nombreImagen, \File::get($fileImagen));
            //Lo actualizamos como parametro
            $alumno->update([
                'imagen' => "storage/" . $nombreImagen
            ]);
        }
        // Volvemos al index pasando un mensaje para evitar quedar con la pagina en blanco
        return redirect()->route('alumnos.index')->with('mensaje', "Registro Actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //Del alumno coges el url de la imagen, le quitas toda la ruta
        $fotoAlumno = basename($alumno->imagen);
        //si el nombre es distinto de default.png se borra
        if ($fotoAlumno != 'default.png') {
            unlink($alumno->imagen);
        }
        $alumno->delete();
        //Lo mandamos de vuelta con el mensaje correspondiente
        return redirect()->route('alumnos.index')->with('mensaje', "Alumno Borrado correctamente");
    }
}
