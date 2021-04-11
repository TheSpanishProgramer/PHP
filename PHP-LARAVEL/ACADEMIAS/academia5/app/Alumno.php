<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Modulo;

class Alumno extends Model
{
    protected $fillable = ['nombre', 'apellidos', 'mail', 'logo'];

    public function modulos()
    {
        return $this->belongsToMany('App\Modulo')->withPivot('nota')->withTimestamps();
    }

    public function modulosOut()
    {
        //Esto me devuelve los id de los modulos que tiene $alumno
        $modulos1 = $this->modulos()->pluck('modulo_id');
        //Esto me devuelve los modulos que le faltan al alumno
        $modulos2 = Modulo::whereNotIn('id', $modulos1)->get();
        return $modulos2;
    }

    public function notaMedia()
    {
        $suma = 0;
        $total = $this->modulos()->count();
        $cont = 0;

        if ($total > 0) {
            foreach ($this->modulos as $modulo) {
                $nota = $modulo->pivot->nota;
                if ($nota != null) {
                    $suma += $nota;
                    $cont++;
                }
            }
            return round(($suma / $cont), 2);
        }
        return "Sin modulos";
    }

    public function scopeModulos()
    {
    }
}
