<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Vendedor;
class Articulo extends Model
{
    //
    protected $fillable=['nombre', 'pvp', 'stock', 'imagen', 'categoria_id'];
    //Un articulo tendra una unica categoria en la relacion 1:n categoria articulos
    public function categoria(){
        return $this->belongsTo(Categoria::class)
        ->withDefault([
            'nombre'=>'Sin Categoria'
        ]);
    }

    public function vendedores(){
        return $this->belongsToMany('App\Vendedor')
        ->withTimestamps()
        ->withPivot('cantidad', 'cliente', 'pvp');
     }

     public function scopeVendedor($query, $v){
        if(!isset($v)){
           return $query;
        }
        if($v=='%'){
            return $query;
        }
        //hago el use($v) para poder usar el valor de $v dentro del ambito de la funcion
        return $query->whereHas('vendedores', function($query) use($v) {$query->where('vendedor_id', 'like', $v); });

    }
}
