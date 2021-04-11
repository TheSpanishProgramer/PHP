<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
     protected $fillable = [
        'name'
    ];


    public function scopeName($query, $name)
    {
        if($name != "")
        {
            $query->where('name' , 'LIKE', "%$name%");
        }
        
    }

    public function clases(){
        return $this->hasMany('App\Clase');
    }
    
}
