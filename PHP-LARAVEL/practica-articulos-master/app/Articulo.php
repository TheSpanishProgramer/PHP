<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable = ['nombre', 'categoria', 'precio', 'stock', 'imagen'];

    public function scopeCategoria($query, $v)
    {
        if (!isset($v)) {
            return $query->where('categoria', 'like', '%');
        }
        if ($v == '%') {
            return $query->where('categoria', 'like', $v);
        }
        return $query->where('categoria', $v);
    }

    public function scopePrecio($query, $v)
    {
        switch ($v) {
            case '%':
                return $query->where('precio', 'like', '%');
                break;
            case 1:
                return $query->where('precio', '<=', 50);
                break;

            case 2:
                return $query->whereBetween('precio', [50, 200]);
                break;

            case 3:
                return $query->where('precio', '>', 200);
                break;
        }
    }
}
