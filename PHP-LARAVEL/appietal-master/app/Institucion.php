<?php

namespace AppIetal;

use Illuminate\Database\Eloquent\Model;
use AppIetal\Institucion;
class Institucion extends Model
{


  protected $fillable = ['user_id','sede','jornada','grado','aprobado','observaciones'];



  public function user(){
                          // Un perfil pertence solo a un usuario
    return $this->belongsTo('App\User');
  }
  public function scopeAprobado($query,$aprobado)// Buscar por la cedula
  {

    if (trim($aprobado) != "")
    {
        $query->where(\DB::raw("CONCAT(aprobado)"),"LIKE","%$aprobado%");
        Session::flash('message','Aprobado:'.' '.$aprobado.'  ' .'Resultado de la busqueda');
     }

  }
}
