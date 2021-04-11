<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'apellidos', 'mail', 'foto'];

    //vamos a poner la relacion n m con asignaturas
    public function asignaturas(){
        return $this->belongsToMany('App\Models\Asignatura')
            ->withPivot('nota')
            ->withTimestamps();
    }
}
