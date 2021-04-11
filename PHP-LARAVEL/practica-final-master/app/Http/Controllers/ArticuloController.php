<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Categoria;
use App\Http\Requests\ArticuloRequest;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $misCategorias = $request->get('categoria_id');
        $articulos = Articulo::orderBy('id')
            ->categoria_id($misCategorias)
            ->paginate(3);
        return view('articulos.index', compact('articulos', 'categorias', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('articulos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloRequest $request)
    {
        $datos = $request->validated();
        $articulo = new Articulo();
        $articulo->nombre = $datos['nombre'];
        $articulo->modelo = $datos['modelo'];
        $articulo->precio = $datos['precio'];
        $articulo->stock = $datos['stock'];
        $articulo->detalles = $datos['detalles'];
        $articulo->categoria_id = $datos['categoria_id'];


        if (isset($datos['foto']) && $datos['foto'] != null) {
            $file = $datos['foto'];
            $nom = 'articulos/' . time() . '_' . $file->getClientOriginalName();
            \Storage::disk('public')->put($nom, \File::get($file));
            $articulo->foto = "img/$nom";
        }
        $articulo->save();
        return redirect()->route('articulos.index')->with('mensaje', 'Producto añadido con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view('articulos.detalles', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(ArticuloRequest $request, Articulo $articulo)
    {
        $datos = $request->validated();
        $articulo->nombre = $datos['nombre'];
        $articulo->modelo = $datos['modelo'];
        $articulo->precio = $datos['precio'];
        $articulo->stock = $datos['stock'];
        $articulo->detalles = $datos['detalles'];

        if (isset($datos['foto']) && $datos['foto'] != 'default.png') {
            $file = $datos['foto'];
            $nom = 'articulos/' . time() . '_' . $file->getClientOriginalName();
            \Storage::disk('public')->put($nom, \File::get($file));
            $articulo->foto = "img/$nom";
        }
        $articulo->update();
        return redirect()->route('articulos.index')->with('mensaje', 'Producto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $foto = $articulo->foto;
        if (basename($foto) != 'default.png') {
            unlink($foto);
        }
        $articulo->delete();
        return redirect()->route('articulos.index')->with('mensaje', 'Producto eliminado con éxito');
    }
}
