<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $table ="profesionales";
    protected $fillable = ['id','name','email','cedula','telefono','status','sede_id'];

    public function cita(){
    	 return $this->hasMany('App\Cita');
    }
    public function servicios(){
    	return $this->belongsToMany('App\Servicio');
    }
    public function sedes(){
    	return $this->belongsToMany('App\Sede');
    }
}
