<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articulo;
class Vendedor extends Model
{
    //
    protected $fillable=['nombre', 'apellido', 'direccion', 'telefono', 'mail', 'imagen'];
    
    public function articulos(){
        return $this->belongsToMany('App\Articulo')
        ->withTimestamps()
        ->withPivot('cantidad', 'cliente', 'pvp');
     }
     public function scopeArticulo($query, $v){
        if(!isset($v)){
           return $query;
        }
        if($v=='%'){
            return $query;
        }
        //hago el use($v) para poder usar el valor de $v dentro del ambito de la funcion
        return $query->whereHas('articulos', function($query) use($v) {$query->where('articulo_id', 'like', $v); });
    }

    public function scopeFiltro($query, $v){

        if(!isset($v)){
           return $query;
        }
        if($v=='%'){
            return $query;
        }
        if($v=='ventas'){
        $vendedors= Vendedor::all();
        $vendedor=new Vendedor();
        $id;
        foreach($vendedors as $item){
            if($item->articulos()->count() >= $vendedor->articulos()->count()){
                $id=$item->id;
                $vendedor=$item;
            }
           // dd($item);
        }     
        return $query->where('id','like', $id);
        }
        if($v='ingresos'){
        $vendedors= Vendedor::all();
        $id;
        $ventaA=0;
        $ventaN=0;
        foreach($vendedors as $vendedor){
            
            foreach($vendedor->articulos as $articulo){
                $ventaN+=$articulo->pivot->pvp;
            }
            if($ventaN>=$ventaA){
                $ventaA=$ventaN;
                $id=$vendedor->id;
            }
            $ventaN=0;
        }
        return $query->where('id','like', $id);
        }
        
    }
}
