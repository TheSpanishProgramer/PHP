<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libro;

class Tema extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'descripcion'];

    //relacion 1:n con libros de un tema hay muchos libros en este ejemplo

    public function libros(){
        return $this->hasMany(Libro::class);
    }
}
