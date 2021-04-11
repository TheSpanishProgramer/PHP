<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellidos', 'dni','cp','poblacion','provincia','tfijo','movil','tutor','active'
    ];


    public function scopeName($query, $name)
    {
        if($name != ""){
            $query->where('name' , 'LIKE', "%$name%");
        }
        
    }

    public function scopeActive($query, $active)
    {
        if($active != ""){
            $query->where('active' , 'LIKE', "%$active%");
        }
        
    }


     public function clases()
    {
        return $this->belongsToMany('App\Clase')->withTimestamps();
    }

  
}
