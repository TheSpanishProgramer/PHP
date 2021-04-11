<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = ['name', 'category_id', 'user_id', 'matricula'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public static function create(array $attributes = [])
    {
        $attributes['matricula'] = str_random(10);

        $subject = static::query()->create($attributes);

        $subject->generateSlug();

        return $subject;
    }

    // genera un slug, si existe ya en la base de datos le concatena el id del curso
    public function generateSlug()
    {
        $this->slug = str_slug($this->name) . '-' . $this->id;

        $this->save();
    }

    // usa el slug para la url
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
