<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'contenido', 'document_id', 'subject_id', 'post_id', 'user_id'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function post()
    {
        return $this->belongsTo(self::class);
    }

    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->user()->id;

        $post = static::query()->create($attributes);

        $post->generateSlug();
        $post->generateSubjectId();

        return $post;
    }

    public function generateSlug()
    {
        $this->slug = str_slug($this->title) . '-' . $this->id;

        $this->save();
    }

    public function generateSubjectId()
    {
        $this->subject_id = $this->document->subject_id;

        $this->save();
    }

    // usa el slug para la url
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
