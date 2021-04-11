<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = "sedes";
    protected $fillable = ['id','name','address','telefono','email','status'];

    public function cita(){
    	 return $this->hasMany('App\Cita');
    }
    public function profesional(){
    	return $this->hasMany('App\Profesional');
    }
    public function servicios(){
    	return $this->belongsToMany('App\Servicio');
    }
}
