<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Http\Requests\AlumnoRequest;
use App\Modulo;
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
        $modulo = $request->get('modulo_id');
        $modulos = Modulo::orderBy('id')->get();
        $alumnos = Alumno::orderBy('id')
        ->modulo($modulo)
        ->paginate(5);

        return view('alumnos.index', compact('alumnos', 'modulos', 'request'));
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        //validaciones genericas

        $datos = $request->validated();
        $alumno = new Alumno();
        $alumno->nombre = $datos['nombre'];
        $alumno->apellido = ucwords($datos['apellido']);
        $alumno->mail = $datos['mail'];

        //Comprobamos si hemos subido imagen o no
        if (isset($datos['logo'])) {
            //Todo bien hemos subido un archivo y es de imagen
            $file = $datos['logo'];
            //creo un nombre para la imagen
            $nombre = 'alumnos/'.time().' '.$file->getClientOriginalName();
            //Guardamos el fichero de la imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //Le pasamos el nombre de la imagen al alumno
            $alumno->logo = "img/$nombre";
        }
        $alumno->save();

        return redirect()->route('alumnos.index')->with('mensaje', 'Alumno creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.detalles', compact('alumno'));
    }

    public function fmatricula(Alumno $alumno)
    {
        $modulos2 = $alumno->modulosOut();
        //Comprobamos si esta ya matriculado el alumno en todos los modulos
        if ($modulos2->count() == 0) {
            return redirect()->route('alumnos.show', $alumno)
            ->with('mensaje', 'Este alumno ya está matriculado de todos los módulos');
        }
        //Cargamos el formulario de matriculacion con los modulos que aun le faltan al alumno
        return view('alumnos.fmatricula', compact('modulos2', 'alumno'));
    }

    public function matricular(Request $request)
    {
        $id = $request->alumno_id;
        //capturamos la id del alumno que estamos matriculando
        $alumno = Alumno::find($id);
        if (isset($request->modulo_id)) {
            foreach ($request->modulo_id as $item) {
                $alumno->modulos()->attach($item);
            }

            return redirect()->route('alumnos.show', $alumno)->with('mensaje'.'Alumno matriculado');
        }

        return redirect()->route('alumnos.show', $alumno)->with('mensaje', 'Ningun modulo seleccionado');
    }

    public function fcalificar(Alumno $alumno)
    {
        $modulos = $alumno->modulos()->get();
        if ($modulos->count() == 0) {
            return redirect()->route('alumnos.show', $alumno)->with('mensaje', 'este alumno no esta matriculado');
        }

        return view('alumnos.fcalificar', compact('alumno'));
    }

    public function calificar(Request $request)
    {
        $alumno = Alumno::find($request->alumno_id);
        foreach ($request->modulos as $k => $v) {
            $alumno->modulos()->updateExistingPivot($k, ['nota' => $v]);
        }

        return redirect()->route('alumnos.show', $alumno)->with('mensaje', 'Calificaciones guardadas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.editar', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $foto = $alumno->logo;
        $request->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'mail' => ['required', 'unique:alumnos,mail,'.$alumno->id],
        ]);
        //Revisamos si se ha subido una imagen
        if ($request->has('logo')) {
            $request->validate([
                'logo' => ['image'],
            ]);
            //Revisamos que no sea la default

            if (basename($foto) != 'default.jpg') {
                //la borro si NO es default.jpg
                unlink($foto);
            }
            $file = $request->file('logo');
            //creo un nombre
            $nombre = 'alumnos/'.time().' '.$file->getClientOriginalName();
            //guardo el archivo imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            $alumno->update($request->all());
            //actualiza la foto del alumno
            $alumno->update(['logo' => "img/$nombre"]);
        } else {
            $alumno->update($request->all());
        }

        return redirect()->route('alumnos.index')->with('mensaje', 'Alumno modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //Dos cosas borrar:
        //la imagen si no es defalt.jpg
        //y borrar el alumno seleccionado

        $foto = $alumno->logo;
        if (basename($foto) != 'default.jpg') {
            //la borro No es default.jpg
            unlink($foto);
        }
        //en cualquier caso borro el registro
        $alumno->delete();

        return redirect()->route('alumnos.index')->with('mensaje', 'alumno borrado correctamente');
    }
}
