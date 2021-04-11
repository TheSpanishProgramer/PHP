<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $fillable = ['nombre', 'apellidos', 'telefono', 'email', 'seccion', 'sueldo'];

    public function vendedores()
    {
        return $this->belongsToMany('App\Articulo')->withPivot('fecha_venta')->withTimestamps();
    }
}
