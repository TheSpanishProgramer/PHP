<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";
    protected $fillable = ['id','name','cedula','email','telefono','address','sede_id'];

    public function cita(){
    	 return $this->hasMany('App\Cita');
    }
    public function sede(){
      return $this->hasOne('App\Sede');
    }
}
