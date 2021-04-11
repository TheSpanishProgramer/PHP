<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Axiom\Rules\ISBN;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$libros= Libro::all(); //$libros es una "coleccion de laravel que devueve todos los libros
        $libros=Libro::paginate(5);
        return view('libros.index', compact('libros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //este seria el action del create
        $request->validate([
            'titulo'=>['required'],
            //bail lo ponemos en validaciones multiples
            //si quieroo que haga de cortafuego
            'isbn'=>['bail', 'required', 'unique:libros,isbn', new Isbn],
            'descripcion'=>['required']
        ]);
        //llego aquí solo si el validate va bien
        Libro::create($request->all());
        return redirect()->route('libros.index')->with('mensaje', "Libro Creado Correctamente");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros.detalle', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        //este seria el action del update
        $request->validate([
            'titulo'=>['required'],
            //bail lo ponemos en validaciones multiples
            //si quieroo que haga de cortafuego
            'isbn'=>['bail', 'required', 'unique:libros,isbn,'.$libro->id, new Isbn],
            'descripcion'=>['required']
        ]);
        //la validació ha ido bien, actualizo el libr
        $libro->update($request->all());
        return redirect()->route('libros.index')->with("mensaje", "Libro Actualizado con exito.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with("mensaje", "Libro Borrado con exito.");
    }
}
// ruta:

// generado con comando
