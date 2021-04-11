<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function category()
    {
        return $this->belongsTo(self::class);
    }

    public static function create(array $attributes = [])
    {
        $category = static::query()->create($attributes);

        $category->generateSlug();

        return $category;
    }

    // genera un slug, si existe ya en la base de datos le concatena el id del curso
    public function generateSlug()
    {
        $this->slug = str_slug($this->name) . '-' . $this->id;

        $this->save();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
