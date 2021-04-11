<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesional;
use App\Servicio;
use App\Sede;
use Laracasts\Flash\Flash;

class ProfesionalController extends Controller
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
        $profesionals = Profesional::orderBy('id','ASC')->paginate(10);
        return view('admin.profesionals.index')->with('profesionals',$profesionals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicio = Servicio::orderBy('id','ASC')->pluck('name','id')->all();
        $sede = Sede::orderBy('id','ASC')->pluck('name','id')->all();
        return view('admin.profesionals.create')
        ->with('servicio',$servicio)
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
       $profesional = new Profesional($request->all());
        $profesional->save();
        $profesional->servicios()->sync($request->servicio);
        flash('Registro Guardado Exitosamente')->success();
        return redirect()->route('profesionals.index');  
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
        $profesional = Profesional::find($id);
        $servicio = Servicio::orderBy('id','ASC')->pluck('name','id')->all();
        $sede = Sede::orderBy('id','ASC')->pluck('name','id')->all();
        $myservicios = $profesional->servicios->pluck('id')->ToArray();
        return view ('admin.profesionals.edit')
            ->with('profesional', $profesional)
            ->with('servicio',$servicio)
            ->with('myservicios',$myservicios)
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
        $profesional = Profesional::find($id);
        $profesional->fill($request->all());
        $profesional->save();
        $profesional->servicios()->sync($request->servicio);
        flash('Registro actualizado de forma exitosa')->success();

        return redirect()->route('profesionals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesional = Profesional::find($id);
        $profesional->delete();
        flash('Se ha Eliminado '.$profesional->name.' de forma exitosa')->error();
        return redirect()->route('profesionals.index');
    }

    public function asignar(){
        //dd("Vista Asignar");
        return view('admin.profesionals.asignar');
    }
    public function intervaloHora($hora_inicio, $hora_fin, $intervalo = 30) {

        $hora_inicio = new DateTime( $hora_inicio );
        $hora_fin    = new DateTime( $hora_fin );
        $hora_fin->modify('+1 second'); // Añadimos 1 segundo para que nos muestre $hora_fin

        // Si la hora de inicio es superior a la hora fin
        // añadimos un día más a la hora fin
        if ($hora_inicio > $hora_fin) {

            $hora_fin->modify('+1 day');
        }

        // Establecemos el intervalo en minutos        
        $intervalo = new DateInterval('PT'.$intervalo.'M');

        // Sacamos los periodos entre las horas
        $periodo   = new DatePeriod($hora_inicio, $intervalo, $hora_fin);        

        foreach( $periodo as $hora ) {

            // Guardamos las horas intervalos 
            $horas[] =  $hora->format('H:i:s');
        }

        return $horas;
    }

}
