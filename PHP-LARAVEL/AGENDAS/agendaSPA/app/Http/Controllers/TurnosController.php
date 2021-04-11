<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turno;
use Laracasts\Flash\Flash;
//COntrolador no esta en Uso
class TurnosController extends Controller
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
        $turnos = Turno::orderBy('id','ASC')->paginate(10);
        return view('admin.turnos.index')->with('turnos',$turnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.turnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turno = new Turno($request->all());
        $turno->save();
        flash('Turno '.$turno->name.' registrado de forma exitosa')->success();
        return redirect()->route('turnos.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turno = Turno::find($id);
        $turno->delete();
        flash('Se ha Eliminado turno  '.$turno->name.' de forma exitosa')->error();
        return redirect()->route('turnos.index');
    }
}
