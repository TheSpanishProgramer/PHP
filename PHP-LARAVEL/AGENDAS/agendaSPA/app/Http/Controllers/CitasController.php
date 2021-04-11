<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Sede;
use App\Cliente;
use App\Profesional;
use App\Servicio;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Laracast\Flash\Flash;


class CitasController extends Controller
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
        $citas = DB::table('citas')
                ->join('sedes','citas.sede_id', '=', 'sedes.id')
                ->join('servicios','citas.servicio_id', '=', 'servicios.id')
                ->join('profesionales','citas.profesional_id', '=', 'profesionales.id')
                ->join('clientes','citas.cliente_id', '=', 'clientes.id')
                ->select('citas.id','citas.reservadate','citas.reservatime','citas.status','citas.notas','sedes.name as sede','servicios.name as servicio','profesionales.name as profesional','clientes.name as cliente','clientes.email')
                ->get();

        $sedes = Sede::orderBy('id','ASC')->pluck('name','id')->all();
        //dd($sedes);
       return view('admin.citas.index')
              ->with('citas',$citas)
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
        $clientes = Cliente::orderBy('id','ASC')->pluck('name','id')->all();
        return view('admin.citas.create')
                ->with('sede',$sede)
                ->with('clientes',$clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $citas = new Cita($request->all());
        //Cambiar formato de hora de 1:00 pm a 13:00:00 
        $cadena = strtotime($citas->reservatime);
        $citas->reservatime = date("H:i", $cadena);
        //obtenemos el usuario que realizo la creacion
        $auth = app()->make('auth');
        $citas->user_id = $auth->id();
        $citas->save();
        /*--Procedimiento para enviar el Email de Notificacion--*/
        //Llmamos a los modelos relacionados para obtener la informacion.
        $sede = Sede::find($citas->sede_id);
        $servicios = Servicio::find($citas->servicio_id);
        $clientes = Cliente::find($citas->cliente_id);
        $correo = $clientes->email;
        $data = array(
            'lugar' => 'Sede: '. $sede->name.', '.$sede->address,
            'fecha' => $citas->reservadate.' hora: '.$citas->reservatime,
            'servicio'=> $servicios->name,
            'nombre' => $clientes->name,
            'c_email' => $clientes->email,
            'notas' => $citas->notas
        );

        Mail::send('admin.citas.resumen', $data, function ($message) use ($correo){
            $message->to($correo)->subject('Informacion sobre su cita');
         });
        flash('Cita registrada de forma exitosa')->success();
        return redirect()->route('citas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == '*') {
            $citas = DB::table('citas')
                    ->join('sedes','citas.sede_id', '=', 'sedes.id')
                    ->join('servicios','citas.servicio_id', '=', 'servicios.id')
                    ->join('profesionales','citas.profesional_id', '=', 'profesionales.id')
                    ->join('clientes','citas.cliente_id', '=', 'clientes.id')
                    ->select('citas.id','citas.reservadate','citas.reservatime','citas.status','citas.notas','sedes.name as sede','sedes.id','servicios.name as servicio','profesionales.name as profesional','clientes.name as cliente','clientes.email')
                    ->get();
            $sedes = Sede::orderBy('id','ASC')->pluck('name','id')->all();
            return view('admin.citas.index')
                    ->with('citas',$citas)
                    ->with('sedes',$sedes);
        }else{
            $citas = DB::table('citas')
                    ->join('sedes','citas.sede_id', '=', 'sedes.id')
                    ->join('servicios','citas.servicio_id', '=', 'servicios.id')
                    ->join('profesionales','citas.profesional_id', '=', 'profesionales.id')
                    ->join('clientes','citas.cliente_id', '=', 'clientes.id')
                    ->select('citas.id','citas.reservadate','citas.reservatime','citas.status','citas.notas','sedes.name as sede','sedes.id','servicios.name as servicio','profesionales.name as profesional','clientes.name as cliente','clientes.email')
                    ->where('sedes.id',$id)
                    ->get();
            $sedes = Sede::orderBy('id','ASC')->pluck('name','id')->all();
            return view('admin.citas.index')
                    ->with('citas',$citas)
                    ->with('sedes',$sedes);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$cita = DB::table('citas')
                ->join('sedes','citas.sede_id', '=', 'sedes.id')
                ->join('servicios','citas.servicio_id', '=', 'servicios.id')
                ->join('profesionales','citas.profesional_id', '=', 'profesionales.id')
                ->join('clientes','citas.cliente_id', '=', 'clientes.id')
                ->select('citas.id','citas.reservadate','citas.reservatime','citas.status','citas.notas','sedes.id as sede_id','sedes.name as sede','servicios.id as servicio_id','servicios.name as servicio','profesionales.id as profesional_id','profesionales.name as profesional','clientes.id as cliente_id','clientes.name as cliente','clientes.email')
                ->where('citas.id','=',$id)
                ->get();*/
        $cita = Cita::find($id);
        $cita->reservatime= date("g:i a",strtotime($cita->reservatime));
        //Cambiar formato de hora de 13:00:00 a 1:00 pm
        $sede = Sede::find($cita->sede_id);
        $cliente = Cliente::find($cita->cliente_id);
        $profesional = Profesional::find($cita->profesional_id);
        $servicio = Servicio::find($cita->servicio_id);
       //dd($cita,$sede,$cliente,$profesional,$servicio);
        return view('admin.citas.edit')
            ->with('cita',$cita)
            ->with('sede',$sede)
            ->with('cliente',$cliente)
            ->with('profesional',$profesional)
            ->with('servicio',$servicio);
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
        $citas = Cita::find($id);
        $citas->fill($request->all());
        $cadena = strtotime($citas->reservatime);
        $citas->reservatime = date("H:i", $cadena);
        $citas->save();
        /*--Procedimiento para enviar el Email de Notificacion--*/
        //Llmamos a los modelos relacionados para obtener la informacion.
        $sede = Sede::find($citas->sede_id);
        $servicios = Servicio::find($citas->servicio_id);
        $clientes = Cliente::find($citas->cliente_id);
        $correo = $clientes->email;
        $correo = $clientes->email;
        $data = array(
            'lugar' => 'Sede: '. $sede->name.', '.$sede->address,
            'fecha' => $citas->reservadate.' hora: '.$citas->reservatime,
            'servicio'=> $servicios->name,
            'nombre' => $clientes->name,
            'c_email' => $clientes->email,
            'notas' => $citas->notas
        );

        Mail::send('admin.citas.resumen', $data, function ($message) use ($correo){
            $message->to($correo)->subject('Estado de su cita');
         });
        flash('Registro actualizado de forma exitosa')->success();

        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $citas = Cita::find($id);
        $citas->delete();
        flash('Registro eliminado de forma exitosa')->success();
        return redirect()->route('citas.index');
    }
    public function byservicio($id){
           return DB::table('sede_servicio')
                    ->join('servicios', function($join)
                    {
                        $join->on('sede_servicio.servicio_id', '=', 'servicios.id');
                    })
                    ->where('sede_servicio.sede_id', '=',$id)
                    ->get();
    }
    public function byprofesional($servicio,$sede){
            return DB::table('profesionales')
                ->join('profesional_servicio',function($join)
                {
                    $join->on('profesional_servicio.profesional_id','=','profesionales.id');
                })
                ->join('sedes','sedes.id', '=','profesionales.sede_id')
                ->select('sedes.id','profesionales.id','profesionales.name','profesionales.sede_id','profesional_servicio.servicio_id')
                ->where('profesionales.sede_id','=',$sede)
                ->where('profesional_servicio.servicio_id', '=',$servicio)
                ->get();
    }
    public function calendarcitas(){
    $agendas = DB::table('citas')
                ->join('sedes','citas.sede_id', '=', 'sedes.id')
                ->join('servicios','citas.servicio_id', '=', 'servicios.id')
                ->join('profesionales','citas.profesional_id', '=', 'profesionales.id')
                ->join('clientes','citas.cliente_id', '=', 'clientes.id')
                ->select('citas.id','citas.notas','sedes.name as sede','servicios.name as servicio','profesionales.name as profesional','clientes.name as cliente','clientes.email','citas.reservadate','citas.reservatime','citas.notas')
                ->get();
       foreach ($agendas as $agenda) {
            $var[]=array("title"=> $agenda->cliente,"url"=>route('citas.edit',$agenda->id), "start"=>$agenda->reservadate."T".$agenda->reservatime,"servicio"=> $agenda->servicio,"sede"=>$agenda->sede,"profesional"=>$agenda->profesional,"cliente"=>$agenda->cliente,"notas"=>$agenda->notas);
        }
        return json_encode($var);
        //return $agendas->toJson();
    }
    public function disponibilidad($profesional_id,$reservadate,$reservatime){
        //Cambiar formato de hora de 1:00 pm a 13:00:00 
        $cadena = strtotime($reservatime);
        $reservatime = date("H:i", $cadena);
        /*--------------------------------------*/
        $result = DB::table('citas')
            ->select('citas.id','citas.reservadate','citas.reservatime','citas.profesional_id')
            ->where('citas.profesional_id', '=',$profesional_id )
            ->where('citas.reservadate', '=',$reservadate)
            ->where('citas.reservatime', '=',$reservatime)
            ->get();
        if ($result->isEmpty()) {
            return 1;
        }else{
            return 0;
        }

    }
    public function clientes(Request $request){
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('clientes')
                    ->where('name','LIKE','%{query}%')
                    ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:realtive">';
            foreach ($data as $row) {
                $output.='<li><a href="#">'.$row->name.'</a></li>';
            }
            $output .='</ul>';
            echo $output;
        }
    }
}
