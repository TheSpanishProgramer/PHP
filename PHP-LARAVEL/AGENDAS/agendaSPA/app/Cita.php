<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cita extends Model
{
	protected $table = "citas";
	protected $fillable = ['id','sede_id','servicio_id','profesional_id','reservadate','reservatime','cliente_id','status','notas','user_id'];

	public function user(){
		return $this->belongsTo('App\User');
	}
	public function cliente(){
		return $this->belongsTo('App\Cliente');
	}
	public function servicio(){
		return $this->belongsTo('App\Servicio');
	}
	public function profesional(){
		return $this->belongsTo('App\Profesional');
	}
	public function sede(){
		return $this->belongsTo('App\Sede');
	}
}
