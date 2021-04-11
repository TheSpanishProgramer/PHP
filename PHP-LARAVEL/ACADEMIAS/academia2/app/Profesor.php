<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $fillable = [
        'name', 'apellidos', 'dni','cp','poblacion','provincia','tfijo','movil','active'
    ];


    protected $table = 'profesores';


    public function scopeName($query, $name)
    {
        if($name != "")
        {
            $query->where('name' , 'LIKE', "%$name%");
        }
        
    }

    public function scopeActive($query, $active)
    {
        if($active != ""){
            $query->where('active' , 'LIKE', "%$active%");
        }
        
    }


    public function clase()
    {
        return $this->hasOne('App\Clase');
    }
    
}
