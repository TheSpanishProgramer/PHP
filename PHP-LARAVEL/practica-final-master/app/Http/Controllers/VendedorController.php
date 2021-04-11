<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Http\Requests\VendedorRequest;
use App\Vendedor;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores = Vendedor::orderBy('id')->paginate(3);
        return view('vendedores.index', compact('vendedores'));
    }

    public function formVentas(Vendedor $vendedore)
    {
        $articulos = Articulo::orderBy('nombre')->get();
        return view('vendedores.formVentas', compact('vendedore', 'articulos'));
    }

    public function venta()
    {
        # code...
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendedorRequest $request)
    {
        $datos = $request->validated();
        $vendedor = new Vendedor();
        $vendedor->nombre = $datos['nombre'];
        $vendedor->apellidos = $datos['apellidos'];
        $vendedor->telefono = $datos['telefono'];
        $vendedor->email = $datos['email'];
        $vendedor->sueldo = $datos['sueldo'];

        if (isset($datos['foto']) && $datos['foto'] != null) {
            $file = $datos['foto'];
            $nom = 'vendedores/' . time() . '_' . $file->getClientOriginalName();
            \Storage::disk('public')->put($nom, \File::get($file));
            $vendedor->foto = "img/$nom";
        }
        $vendedor->save();
        return redirect()->route('vendedores.index')->with('mensaje', 'Empleado añadido con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendedor $vendedore)
    {
        return view('vendedores.detalles', compact('vendedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedore)
    {
        return view('vendedores.edit', compact('vendedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(VendedorRequest $request, Vendedor $vendedore)
    {
        $datos = $request->validated();
        $vendedore->nombre = $datos['nombre'];
        $vendedore->apellidos = $datos['apellidos'];
        $vendedore->telefono = $datos['telefono'];
        $vendedore->email = $datos['email'];
        $vendedore->sueldo = $datos['sueldo'];

        if (isset($datos['foto']) && $datos['foto'] != 'default.jpg') {
            $file = $datos['foto'];
            $nom = 'vendedores/' . time() . '_' . $file->getClientOriginalName();
            \Storage::disk('public')->put($nom, \File::get($file));
            $vendedore->foto = "img/$nom";
        }
        $vendedore->update();
        return redirect()->route('vendedores.index')->with('mensaje', 'Empleado actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedore)
    {
        $foto = $vendedore->foto;
        if (basename($foto) != 'default.jpg') {
            unlink($foto);
        }
        $vendedore->delete();
        return redirect()->route('vendedores.index')->with('mensaje', 'Empleado eliminado con éxito');
    }
}
