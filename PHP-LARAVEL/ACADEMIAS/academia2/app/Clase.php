<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'name' , 'numero'
    ];


     public function scopeName($query, $name)
    {
        if($name != ""){
            $query->where('name' , 'LIKE', "%$name%");
        }
        
    }


    public function profesor()
    {
        return $this->hasOne('App\Profesor');
    }

    public function alumnos()
    {
        return $this->belongsToMany('App\Alumno')->withTimestamps();
    }


    public function asignatura()
    {
        return $this->belongsTo('App\Asignatura');
    }
}
