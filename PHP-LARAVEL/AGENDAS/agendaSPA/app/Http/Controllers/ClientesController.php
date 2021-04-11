<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Sede;
use Laracasts\Flash\Flash;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Cliente::orderBy('id','ASC')->paginate(10);
        return view('admin.clientes.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $sede = Sede::orderBy('id','ASC')->pluck('name','id')->all();
        return view('admin.clientes.create')
        ->with('sede',$sede);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $cliente = new Cliente($request->all());
        $cliente->save();
        flash('Registro Guardado Exitosamente')->success();
        return redirect()->route('clientes.index');
    }
    //Este metodo fue creado para agregar el cliente en tiempo real, en la seccion de asignar las citas
    public function store_ajax(Request $request)
    {

        $cliente = new Cliente($request->all());
        $cliente->save();
        flash('Registro Guardado Exitosamente')->success();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = cliente::find($id);
        $sede = Sede::orderBy('id','ASC')->pluck('name','id')->all();
        return view ('admin.clientes.edit')
          ->with('cliente', $cliente)
          ->with('sede',$sede);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->fill($request->all());
        $cliente->save();
        flash('Registro actualizado de forma exitosa')->success();

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        flash('Se ha Eliminado '.$cliente->name.' de forma exitosa')->error();
        return redirect()->route('clientes.index');
    }
}
