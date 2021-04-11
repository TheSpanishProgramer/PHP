<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use App\Sede;
use Laracasts\Flash\Flash;

class ServiciosController extends Controller
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
        $servicios = Servicio::orderBy('id','ASC')->paginate(5);
        $sedes = Sede::orderBy('id','ASC')->pluck('name','id')->all();
        return view('admin.servicios.index')
            ->with('servicios',$servicios)
            ->with('sedes',$sedes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sede = Sede::orderBy('id','ASC')->pluck('name','id')->all();
        return view('admin.servicios.create')->with('sede',$sede);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicio = new Servicio($request->all());
        $servicio->save();
        $servicio->sedes()->sync($request->sede);
        flash('Servicio '.$servicio->name.' registrado de forma exitosa')->success();
        return redirect()->route('servicios.index');
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
        $servicios = Servicio::find($id);
        $sedes = Sede::orderBy('id','ASC')->pluck('name','id')->all();
        $mysedes = $servicios->sedes->pluck('id')->ToArray();
        //return dd($mysedes);
        return view ('admin.servicios.edit')
                ->with('servicios', $servicios)
                ->with('sedes',$sedes)
                ->with('mysedes',$mysedes);
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
        $servicio = Servicio::find($id);
        $servicio->fill($request->all());
        $servicio->save();
        $servicio->sedes()->sync($request->sedes);
        flash('Servicio '.$servicio->name.' actualizado de forma exitosa')->success();
        return redirect()->route('servicios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sede = Servicio::find($id);
        $sede->delete();
        flash('Se ha Eliminado '.$sede->name.' de forma exitosa')->error();
        return redirect()->route('servicios.index');    }
}
