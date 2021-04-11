<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use App\Sede;

class SedesController extends Controller
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
        $sedes = Sede::orderBy('id','ASC')->paginate(10);
        return view('admin.sedes.index')->with('sedes',$sedes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sedes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Verificar Guardado de Imagenes
        //Manipulacion de Imagenes
       /* if ($request->file('logo') ) {
            $file = $request->file('logo');
            $name = 'logotipo_'. time() .'.'. $file->getClientOriginalExtension();
            $path = public_path().'\images\sedes';
            $file->move($path,$name);
        }*/
        $sede = new Sede($request->all());
        $sede->save();
        flash('Sede '.$sede->name.' registrada de forma exitosa')->success();
        return redirect()->route('sedes.index');
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
        $sede = Sede::find($id);
        return view ('admin.sedes.edit')->with('sede', $sede);
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
        $sede = Sede::find($id);
        $sede->fill($request->all());
        $sede->save();
        flash('Registro actualizado de forma exitosa')->success();

        return redirect()->route('sedes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sede = Sede::find($id);
        $sede->delete();
        flash('Se ha Eliminado '.$sede->name.' de forma exitosa')->error();
        return redirect()->route('sedes.index');
    }
    public function sedes(){
        $sedes = Sede::orderBy('id','ASC');
        return view('admin.sedes.index')->with('sedes',$sedes);
    }
}
