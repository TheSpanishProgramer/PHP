<?php

namespace App\Http\Controllers;

use App\Models\{Libro, Tema};
use Illuminate\Http\Request;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $temas=Tema::OrderBy('nombre')->get();

        $libros=Libro::orderBy('titulo')
        ->tema_id($request->tema)
        ->stock($request->stock)
        ->paginate(3);

        return view('libros.index', compact('libros', 'temas', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temas=Tema::OrderBy('nombre')->get();
        return view('libros.create', compact('temas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>['required', 'string', 'min:5', 'max:80'],
            'sinopsis'=>['required', 'string', 'min:15', 'max:250'],
            'stock'=>['required', 'numeric'],
            'tema_id'=>['required']
        ]);
        try{

            Libro::create($request->all());

            return redirect()->route('libros.index')->with('mensaje', 'Libro creado');
        }catch(\Exception $ex){
            //dd($ex->getMessage());
            return redirect()->route('libros.index')->with('error', 'No se pudo crear el libro: '.$ex->getMessage());
        }
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
        $temas=Tema::OrderBy('nombre')->get();
        return view('libros.edit', compact('libro', 'temas'));
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
        //dd($request);
        $request->validate([
            'titulo'=>['required', 'string', 'min:5', 'max:80'],
            'sinopsis'=>['required', 'string', 'min:15', 'max:250'],
            'stock'=>['required', 'numeric'],
            'tema_id'=>['required']
        ]);
        try{
             $libro->update($request->all());
             return redirect()->route('libros.index')->with('mensaje', 'Libro Actualizado');

        }catch(\Exception $ex){
            return redirect()->route('libros.index')->with('error', 'No se pudo actualizar el libro: '.$ex->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        try{
               $libro->delete();
               return back()->with('mensaje', "Libro Borrado");
        }catch(\Exception $ex){
                return back()->with('error', "No se pudo borrar el libro: ".$ex->getMessage());
        }
    }

    //------------------------------------
    public function verLibrosTema($id){
        $tema=Tema::find($id);
        $nombreTema = $tema->nombre;
        $libros=Libro::where('tema_id','=',  $id)->orderBy('titulo')->paginate(3);
        return view('libros.librostema', compact('libros', 'nombreTema'));
    }
}
