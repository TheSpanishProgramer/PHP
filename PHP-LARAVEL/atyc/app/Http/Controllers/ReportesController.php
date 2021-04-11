<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Models\Cursos\Curso;
use App\Reporte;
use App\Periodo;
use DB;
use Excel;
use PDF;
use Auth;
use Datatables;
use Cache;

class ReportesController extends Controller
{
    public function get()
    {
        return view('reportes', $this->getSelectOptions());
    }

    /**
     * Opciones para los selects del front end.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSelectOptions()
    {
        $provincias = Cache::remember('provincias', 5, function () {
            return Provincia::all();
        });

        $periodos = Cache::remember('periodos', 5, function () {
            return Periodo::orderBy('hasta', 'desc')->get();
        });

        return compact('provincias', 'periodos');
    }

    public function getCursos()
    {
        return $this->reporte(5);
    }

    public function efectores()
    {
        return $this->reporte(6);
    }

    public function reporte($id_reporte)
    {
        $reporte = Reporte::findOrFail($id_reporte);

        $provincia_usuario = Provincia::findOrFail(Auth::user()->id_provincia);

        $data = array_merge($this->getSelectOptions(), compact('reporte', 'provincia_usuario'));
        
        logger($reporte->view);

        return view('reportes.'.$reporte->view, $data);
    }

    public function queryReporte(Request $r)
    {
        $query_default = $this->queryLogica($r);

        if ($r->id_reporte == '6') {
            $data = [];
            if (array_key_exists('desde', $r->filtros)) {
                $desde = $r->filtros['desde'];
                $hasta = $r->filtros['hasta'];
                $data = $query_default->get()
                    ->map(function ($value) use ($desde, $hasta) {
                        $value->periodo = "{$desde}-{$hasta}";
                        return $value;
                    });
            } else {
                foreach ($query_default as $compuesta) {
                    $desde = $compuesta['periodo']->desde;
                    $hasta = $compuesta['periodo']->hasta;
                    $aux = $compuesta['query']->get()
                    ->map(function ($value) use ($desde, $hasta) {
                        $value->periodo = "{$desde}-{$hasta}";
                        return $value;
                    });
                    $data = array_merge($data, $aux->toArray());
                }
            }
        } elseif ($r->id_reporte == 4) {
            $data = $query_default->get();
        } else {
            $data = DB::select($query_default);
        }

        return Datatables::of(collect($data))->make(true);
    }

    public function queryLogica(Request $r)
    {
        $id_reporte = $r->id_reporte;

        $id_provincia = array_key_exists('id_provincia', $r->filtros)?
        $r->filtros['id_provincia']:Auth::user()->id_provincia;

        if (array_key_exists('id_periodo', $r->filtros)) {
            $id_periodo = $r->filtros['id_periodo'];
        } elseif (array_key_exists('desde', $r->filtros) && array_key_exists('hasta', $r->filtros)) {
            $desde = $r->filtros['desde'];
            $hasta = $r->filtros['hasta'];
        }
        
        if (!array_key_exists('id_periodo', $r->filtros)) {
            if ($id_reporte == '6') {
                $query = $this->reporte6($id_provincia, $desde, $hasta);
            } else {
                $query = "SELECT CONCAT('{$desde}'::date,'/','{$hasta}'::date) as periodo,* 
                FROM reporte_{$r->id_reporte}('{$id_provincia}','{$desde}','{$hasta}')";
            }
        } elseif ($id_reporte == '5' and $id_periodo == '0') {
            $query = "SELECT P.nombre as periodo ,R.* 
            FROM sistema.periodos P,reporte_{$id_reporte}({$id_provincia},P.desde,P.hasta) R 
            order by P.id_periodo,R.provincia,R.nombre,R.edicion";
        } elseif ($id_reporte == '6') {
            if ($id_periodo == '0') {
                $periodos = Periodo::all();
                //Armo todas las queries en un array
                foreach ($periodos as $periodo) {
                    $query[] = [
                        'periodo' => $periodo,
                        'query' => $this->reporte6($id_provincia, $periodo->desde, $periodo->hasta)
                    ];
                }
            } else {
                $periodo = Periodo::findOrFail($id_periodo);
                $query[] = [
                    'periodo' => $periodo,
                    'query' => $this->reporte6($id_provincia, $periodo->desde, $periodo->hasta)
                ];
            }
        } elseif ($id_reporte == '4') {
            $query = $this->reporte4($id_provincia, $id_periodo);
        } elseif ($id_periodo == '0') {
            $query = "SELECT P.nombre as periodo ,R.* 
            FROM sistema.periodos P,reporte_{$id_reporte}({$id_provincia},P.desde,P.hasta) R";
        } else {
            $query = "SELECT P.nombre as periodo ,R.*
            FROM sistema.periodos P,reporte_{$id_reporte}({$id_provincia},P.desde,P.hasta) R 
            where P.id_periodo = {$id_periodo}";
        }

        return $query;
    }

    public function getExcelReporte(Request $r)
    {
        ini_set('memory_limit', '1024M');
        $reporte = Reporte::findOrFail($r->id_reporte);
        $query_default = $this->queryLogica($r);
        $nombre_reporte = $reporte->view;

        $order_by = $r->order_by;

        $excel_reporte = "excel.reporte_".$r->id_reporte;

        if ($r->id_reporte == '6') {
            $data = [];
            if (array_key_exists('desde', $r->filtros)) {
                $desde = $r->filtros['desde'];
                $hasta = $r->filtros['hasta'];
                $data = $query_default->get()
                    ->map(function ($value) use ($desde, $hasta) {
                        $value->periodo = "{$desde}-{$hasta}";
                        return $value;
                    });
            } else {
                foreach ($query_default as $compuesta) {
                    $desde = $compuesta['periodo']->desde;
                    $hasta = $compuesta['periodo']->hasta;
                    $aux = $compuesta['query']->get()
                    ->map(function ($value) use ($desde, $hasta) {
                        $value->periodo = "{$desde}-{$hasta}";
                        return $value;
                    });
                    $data = array_merge($data, $aux->toArray());
                }
            }
        } elseif ($r->id_reporte == 4) {
            $data = $query_default->get();
        } else {
            $data = DB::select($query_default);
        }

        if(isset($order_by))
        {
            //Convierto el dato a array
            $data = json_decode(json_encode($data), true);
            //Pido los nombres de las columnas del dato
            $ordenadores = array_keys($data[0]);
            //Pido solo la columna que voy a ordenar
            $columns = array_column($data, $ordenadores[$order_by[0][0]]);
            //Veo si vino ascendente o descendiente
            $sort = ($order_by[0][1] == "asc") ? SORT_ASC : SORT_DESC;
            //Ordeno
            array_multisort($columns, $sort, $data);
        }
        
        $datos = ['resultados' => $data,'nombre' => $excel_reporte];
        $path = $nombre_reporte."_".date("Y-m-d_H:i:s");

        Excel::create(
            $path,
            function ($excel) use ($datos) {
                $excel->sheet(
                    'Reporte',
                    function ($sheet) use ($datos) {
                        $sheet->setHeight(1, 20);
                        $sheet->loadView($datos['nombre'], $datos);
                    }
                );
            }
        )
        ->store('xls');

        return $path;
    }

    public function getPDFReporte(Request $r)
    {
        $reporte = Reporte::find($r->id_reporte);
        $query_default = $this->queryLogica($r);
        $nombre_reporte = $reporte->view;

        $pdf_reporte = "excel.reporte_".$r->id_reporte;

        $data = DB::select($query_default);
        $datos = ['resultados' => $data];
        $path = $nombre_reporte."_".date("Y-m-d_H:i:s");

        $pdf = PDF::loadView($pdf_reporte, $datos)->save($path.".pdf");

        return $path;
    }


    public function reporte4($id_provincia, $id_periodo)
    {
        $query = DB::table("efectores.mv_reporte_4 as R")
        ->join('sistema.provincias as P', "P.id_provincia", '=', "R.id_provincia");

        if($id_periodo != 0){
            $query = $query->join('sistema.periodos as PE', "PE.id_periodo", '=', DB::raw("{$id_periodo}"));
        } else {
            $query = $query->crossJoin('sistema.periodos as PE');
        }
        $query = $query->select('R.id_provincia', 'R.desde', 'R.hasta', 'R.capacitados', 'R.total', 'R.porcentaje', 'P.nombre as provincia', 'PE.nombre as periodo')
        ->whereColumn('R.desde', 'PE.desde')
        ->whereColumn('R.hasta', 'PE.hasta')
        ->orderBy('PE.hasta', 'ASC')
        ->orderBy('PE.desde', 'DESC')
 		->orderBy('P.id_provincia', 'ASC');
       

        if ($id_provincia != 0) {
            $query = $query->where("R.id_provincia", $id_provincia);
        }

        return $query;
    }

    public function reporte5($id_provincia = '0', $desde = '2014-01-01', $hasta = '2014-12-31')
    {
        $query = DB::table('sistema.provincias as p')
        ->leftJoin(
            'efectores.datos_geograficos as dg',
            DB::raw('dg.id_provincia::integer'),
            '=',
            'p.id_provincia'
        )
        ->join('efectores.efectores as e', 'e.id_efector', '=', 'dg.id_efector')
        ->join('efectores.compromiso_gestion as cg', 'cg.id_efector', '=', 'e.id_efector')
        ->join('alumnos.alumnos as a', 'a.establecimiento1', '=', 'e.cuie')
        ->join('cursos.cursos_alumnos as ca', 'ca.id_alumno', '=', 'a.id_alumno')
        ->join('cursos.cursos as c', 'c.id_curso', '=', 'c.id_curso')
        ->select('p.nombre as provincia', DB::raw('count(distinct e.cuie) as capacitados'))
        ->whereBetween('c.fecha_ejec_inicial', [$desde,$hasta])
        ->where('e.integrante', 'S')
        ->where('e.compromiso_gestion', 'S')
        ->groupBy('p.nombre');

        if ($id_provincia != '0') {
            $query = $query->where('p.id_provincia', $id_provincia);
        }

        return $query;
    }

    public function reporte6($id_provincia, $desde, $hasta)
    {
        $query = DB::table('efectores.efectores as e ')
        ->join('efectores.datos_geograficos as dg', 'dg.id_efector', '=', 'e.id_efector')
        ->join('geo.provincias as p', 'p.id_provincia', '=', 'dg.id_provincia')
        ->join('geo.departamentos as d', 'd.id', '=', 'dg.id_departamento')
        ->join('geo.localidades as l', 'l.id', '=', 'dg.id_localidad')
        ->join('alumnos.alumnos as a', 'a.establecimiento1', '=', 'e.cuie')
        ->join('cursos.cursos_alumnos as ca', 'ca.id_alumno', '=', 'a.id_alumno')
        ->join('cursos.cursos as c', 'c.id_curso', '=', 'ca.id_curso')
        ->join('cursos.areas_tematicas as at', 'at.id_area_tematica', '=', 'c.id_area_tematica')
        ->select('p.descripcion as provincia', 'e.cuie', 'e.nombre as efector', 'e.denominacion_legal', 'd.nombre_departamento as departamento', 'l.nombre_localidad as localidad ', 'c.nombre as accion', 'at.nombre as tematica', 'c.fecha_ejec_inicial', DB::raw('count(*) as participantes'))
        ->where('e.integrante', 'S')
        ->where('e.compromiso_gestion', 'S')
        ->whereBetween('c.fecha_ejec_inicial', [$desde,$hasta]);

        if ($id_provincia != 0) {
            $query = $query->whereRaw("dg.id_provincia::integer = {$id_provincia} ");
        }

        logger()->info($query->toSql());

        return $query->groupBy('p.descripcion', 'e.cuie', 'e.nombre', 'e.denominacion_legal', 'd.nombre_departamento', 'l.nombre_localidad', 'c.nombre', 'at.nombre', 'c.fecha_ejec_inicial');
    }
}
