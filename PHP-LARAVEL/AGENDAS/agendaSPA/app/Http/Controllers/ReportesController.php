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
use Laracast\Flash\Flash;

class ReportesController extends Controller
{
    public function index(){
    	$sede = DB::table('sedes')->select('id','name')->get();
    	$profesional = DB::table('profesionales')->select('id','name')->get();
    	$servicio = DB::table('servicios')->select('id','name')->get();
    
 		return view('admin.reportes.index')
    			->with('sede',$sede)
    			->with('profesional',$profesional)
    			->with('servicio',$servicio);
    }
    public function general($sede){
        $negative[]=array("No Existen Registros asociados a su busqueda");
    	if ($sede =='*') {
    		$reports = DB::table('citas')
                ->join('sedes','citas.sede_id', '=', 'sedes.id')
                ->join('servicios','citas.servicio_id', '=', 'servicios.id')
                ->join('profesionales','citas.profesional_id', '=', 'profesionales.id')
                ->join('clientes','citas.cliente_id', '=', 'clientes.id')
                ->select('citas.id','citas.reservadate','citas.reservatime','citas.status','citas.notas','sedes.name as sede','sedes.id','servicios.name as servicio','profesionales.name as profesional','clientes.name as cliente','clientes.email')
                ->orderBY('citas.reservadate','ASC')
                ->get();
            if ($reports->isEmpty()) {
                $reports = $negative;
            }
    	}else{
		   $reports = DB::table('citas')
            ->join('sedes','citas.sede_id', '=', 'sedes.id')
            ->join('servicios','citas.servicio_id', '=', 'servicios.id')
            ->join('profesionales','citas.profesional_id', '=', 'profesionales.id')
            ->join('clientes','citas.cliente_id', '=', 'clientes.id')
            ->select('citas.id','citas.reservadate','citas.reservatime','citas.status','citas.notas','sedes.name as sede','sedes.id','servicios.name as servicio','profesionales.name as profesional','clientes.name as cliente','clientes.email')
            ->where('sedes.id','=',$sede)
            ->orderBY('citas.reservadate','ASC')
            ->get();
    	}

    	$view = view('admin.reportes.general')->with('reports',$reports);
    	$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		return $pdf->stream(); 
    }
}
