<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tema;

class Libro extends Model
{
    use HasFactory;
    protected $fillable=['titulo', 'sinopsis', 'stock', 'tema_id'];

    //la relacion 1:N con temas un libro tiene un único tema en este ejemplo
    public function tema(){
        return $this->belongsTo(Tema::class);
    }



    //Creando nuestros scopes
    public function scopeTema_id($query, $v){
        if($v=="%"){
            return $query->where('tema_id', 'like', $v);
        }
        return $query->where('tema_id', '=', $v);

    }
    public function scopeStock($query, $v){
        if($v=="%"){
            return $query->where('stock', 'like', $v);
        }
        if($v==1) return $query->where('stock', '<', '11');
        if($v==2) return $query->where('stock', '>', '10')->where('stock', '<', '51');
        if($v==3) return $query->where('stock', '>', '50');
    }
}
