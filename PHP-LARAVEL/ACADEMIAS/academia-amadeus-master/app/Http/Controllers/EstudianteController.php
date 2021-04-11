<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Estudiante;

class EstudianteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiante = Estudiante::all();
        return view('amadeus_content.estudiantes.index',['estudiante' => $estudiante]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('amadeus_content.estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Estudiante::create($request->all());
        } catch (\Illuminate\Database\QueryException $qe) {
            return redirect()->back()->withErrors(['No se pudo crear el estudiante.']);
        }

        return redirect()->route('amadeus_content.estudiantes.index')
                ->with('success','Estudiante registrado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        return view('amadeus_content.estudiantes.show',['estudiante' => $estudiante]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        return view('amadeus_content.estudiantes.edit',['estudiante' => $estudiante]);
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
        try{
            Estudiante::find($id)->update($request->all());
        } catch (\Illuminate\Database\QueryException $qe) {
          return redirect()->back()->withErrors(['Error al editar el estudiante']);
        }

        return redirect()->route('amadeus_content.estudiantes.index')
                ->with('success','Estudiante modificado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $estudiante = Estudiante::find($id);
            $estudiante->delete();
        } catch (\Illuminate\Database\QueryException $qe) {
            return redirect()->back()->withErrors(['Error al eliminar el estudiante']);
        }

        return redirect()->route('amadeus_content.estudiantes.index')
                ->with('success','Estudiante eliminado satisfactoriamente.');
    }
}
