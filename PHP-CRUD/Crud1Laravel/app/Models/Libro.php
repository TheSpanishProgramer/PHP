<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    //estos campos de la tabla libros los podré rellenar via formulario.
    protected $fillable=['titulo', 'descripcion', 'isbn'];
}
