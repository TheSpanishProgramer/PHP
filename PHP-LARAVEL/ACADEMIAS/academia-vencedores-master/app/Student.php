<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
	use SoftDeletes;

	public function getAverageNoteAttribute()
    {
        $average = Note::where('student_id', $this->id)->avg('value');
        if ($average)
            return $average;
        return '-';
    }

    public function getLastEnrollmentAttribute()
    {
        // order by created_at desc first is better than get() and after last()
        return Enrollment::where('student_id', $this->id)->orderBy('created_at', 'desc')->first();
    }
}
