<?php

namespace AppIetal;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use AppIetal\Profiles;

class Profile extends Model
{
  protected $fillable = ['numDoc','tipoDoc','lugarNa','feNa','direccion','telefono','estracto','rh','sexo','seguridadS',
                        'user_id','sisben','procedencia','foto','desplazado','madreC','lugarDeplazado','epsFile','sisbenFile','docFile'];



  public function user(){
                          // Un perfil pertence solo a un usuario
    return $this->belongsTo('AppIetal\User');
  }
   public function scopeNumDoc($query,$numDoc){
   // Buscar por la cedula

        if (trim($numDoc) != ""){
            $query->where(\DB::raw("CONCAT(numDoc)"),"LIKE","%$numDoc%");
            Session::flash('message','Numero de identificacion:'.' '.$numDoc.'  ' .'Resultado de la busqueda');
         }

   }

   public function getAgeAttribute()
   {

     return Carbon::parse($this->feNa)->age;
   }
   public function getYearAttribute()
   {
     $date = Carbon::now();
     $date = $date->format('d-m-Y');
     return $date;
   }


}
