<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipos = ['Bazar', 'Electrónica', 'Hogar'];
        $precios = [
            '%' => 'Todos',
            '1' => 'Menos de 50 €',
            '2' => '50 € - 200 €',
            '3' => 'Más de 200 €'
        ];
        $misCategorias = $request->get('categoria');
        $misPrecios = $request->get('precio');
        $articulos = Articulo::orderBy('id')
            ->categoria($misCategorias)
            ->precio($misPrecios)
            ->paginate(3);

        return view('articulos.index', compact('articulos', 'tipos', 'request', 'precios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = ['Bazar', 'Electrónica', 'Hogar'];
        return view('articulos.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('imagen')) {
            $request->validate([
                'imagen' => ['image']
            ]);
            $file = $request->file('imagen');
            $nombre = 'articulos/' . time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            $articulo = Articulo::create($request->all());
            $articulo->update(['imagen' => "img/$nombre"]);
        } else {
            Articulo::create($request->all());
        }
        return redirect()->route('articulos.index')->with("mensaje", "Articulo añadido");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $tipos = ['Bazar', 'Electrónica', 'Hogar'];
        $articulos = Articulo::orderBy('id')->get();
        return view('articulos.edit', compact('articulos', 'articulo', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        if ($request->has('imagen')) {
            $request->validate([
                'imagen' => ['image']
            ]);

            $file = $request->file('imagen');
            $nombre = 'articulos/' . time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));

            if (basename($articulo->imagen) != 'default.jpg') {
                unlink($articulo->imagen);
            }

            $articulo->update($request->all());
            $articulo->update(['imagen' => "img/$nombre"]);
        } else {
            $articulo->update($request->all());
        }
        return redirect()->route('articulos.index')->with("mensaje", "Artículo modificado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $imagen = $articulo->imagen;
        if (basename($imagen) != "default.jpg") {
            unlink($imagen);
        }
        $articulo->delete();
        return redirect()->route('articulos.index')->with('mensaje', "Artículo Eliminado");
    }
}
