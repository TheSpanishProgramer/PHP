<?php

namespace App\Http\Controllers;

use App\Models\{Alumno, Asignatura};
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alumnos=Alumno::orderBy('apellidos')
        ->apellidos($request->get('apellidos'))
        ->paginate(5)->withQueryString();

        $selectOption = $request->apellidos;

        return view('alumnos.aindex', compact('alumnos', 'selectOption'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.detalles', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }

    ### mis métodos
    public function asignaturasAlumno(Alumno $alumno){
        $asignaturas=$alumno->asignaturas()->get();
        return view('matriculas.modulosalumno', compact('asignaturas', 'alumno'));
    }

    public function borrarMatricula(Alumno $alumno, Asignatura $asignatura){
        $alumno->asignaturas()->detach($asignatura->id);
        return redirect()->back()->with('mensaje', "Matrícula Borrarda Correctamente");

    }
    public function editarMatricula(Alumno $alumno, Asignatura $asignatura, int $token){
        return view('matriculas.medit', compact('alumno', 'asignatura', 'token'));

    }
    public function updateMatricula(Request $request, Alumno $alumno, Asignatura $asignatura, int $token){
        //dd($token);
        $request->validate([
            'nota'=>['required']
        ]);
        $alumno->asignaturas()->updateExistingPivot($asignatura->id, ['nota'=>$request->nota]);

        return  ($token==1) ? redirect()->route('matriculas.asignaturasalumno', $alumno)->with('mensaje', 'Nota cambiada') :
            redirect()->route('matriculas.alumnosasignatura', $asignatura)->with('mensaje', "Nota modificada");

    }

    public function createMatricula(Alumno $alumno){
        $asignaturas=$alumno->asignaturasOut();
        $total=$asignaturas->count();

        return view('matriculas.create', compact('alumno', 'asignaturas', 'total'));
    }
    public function storeMatricula(Request $request){
            $alumno=Alumno::find($request->alumno_id);
            if(is_array($request->misAsignaturas)){
                foreach($request->misAsignaturas as $id){
                    $alumno->asignaturas()->attach($id);
                }
            }
            return redirect()->route('matriculas.asignaturasalumno', $alumno)->with('mensaje', 'Matrícula/s realizada/s');

    }
    //---------------------------------------------------------------------------------------------------
}
