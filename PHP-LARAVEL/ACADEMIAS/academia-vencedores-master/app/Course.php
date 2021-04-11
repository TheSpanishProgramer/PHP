<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Course extends Model
{
    use SoftDeletes;

    public function noteForStudent($id)
    {
        $note = Note::where('course_id', $this->id)->where('student_id', $id)->orderBy('created_at', 'desc')->first();
        if ($note)
            return $note->value;

        return '-';
    }
}
