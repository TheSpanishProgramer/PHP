<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articulo;
class Categoria extends Model
{
    //
    protected $fillable=['nombre'];
    //vamos con las relaciones es 1:N es decir de una categoria
    //tendremos muchos articulos, en categorias pondremos
    public function articulos(){
        return $this->hasMany(Articulo::class);
    
    }
}
