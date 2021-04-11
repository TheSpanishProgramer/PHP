<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicios";
    protected $fillable = ['id','name','costo','sede_id'];

    public function cita(){
    	 return $this->hasMany('App\Cita');
    }
    public function profesionales(){
    	return $this->belongsToMany('App\Profesional')->withTimestamps();
    }
    public function sedes(){
    	return $this->belongsToMany('App\Sede')->withTimestamps();
    }
}
