<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paises=['España','Francia','Alemania','Italia','USA','Japon'];
        $misPaises=$request->get('pais');
        $marcas = Marca::orderBy('nombre')
        ->pais($misPaises)
        ->paginate(3);
        return view('marcas.index', compact('marcas','paises','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::orderBy('nombre')->get();
        return view('marcas.create', compact('marcas'));
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
            'nombre' => ['required', 'unique:marcas,nombre'],
        ]);

        if ($request->has('logo')) {
            $request->validate([
                'logo' => ['image']
            ]);
            $file = $request->file('logo');
            $nombre = 'marcas/' . time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            $coche = Marca::create($request->all());
            $coche->update(['logo' => "img/$nombre"]);
        } else {
            Marca::create($request->all());
        }
        return redirect()->route('marcas.index')->with("mensaje", "Marca guardada");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        return view('marcas.detalle', compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        $marcas = Marca::orderBy('nombre')->get();
        return view('marcas.edit', compact('marcas', 'marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => ['required', 'unique:marcas,nombre,' . $marca->id]
        ]);

        if ($request->has('logo')) {
            $request->validate([
                'logo' => ['image']
            ]);
            $file = $request->file('logo');
            $nombre = 'marcas/' . time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            if (basename($marca->logo) != 'default.jpg') {
                unlink($marca->logo);
            }
            $marca->update($request->all());
            $marca->update(['logo' => "img/$nombre"]);
        } else {
            $marca->update($request->all());
        }
        return redirect()->route('marcas.index')->with("mensaje", "Marca modificada");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $logo = $marca->logo;
        if (basename($logo) != "default.jpg") {
            unlink($logo);
        }

        $marca->delete();
        return redirect()->route('marcas.index')->with('mensaje', "Marca eliminada");
    }
}
