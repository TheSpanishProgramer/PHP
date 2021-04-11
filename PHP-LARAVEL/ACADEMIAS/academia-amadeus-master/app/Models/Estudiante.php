<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
 	protected $primaryKey = "cedula";

 	protected $fillable = [
 		'nombre', 'apellido', 'lugar_nacimiento', 'fecha_nacimiento', 
 		'sexo', 'instituto', 'correo_electronico', 'numero_telefonico',
 		'nivel_estudio',
 	];
}