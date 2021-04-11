<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactme extends Model
{
    protected $fillable = ['name', 'email', 'message', 'solved'];

    public static function create(array $attributes = [])
    {
        $attributes['solved'] = 0;
        $category = static::query()->create($attributes);

        return $category;
    }
}
