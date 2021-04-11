<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'student_id', 'level', 'semester',
        'enrollment_payment', 'monthly_payment', 'uniform_payment',
        'courses'
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function getSelectedCoursesAttribute()
    {
        $courses_id = explode(',', $this->courses);
        return Course::whereIn('id', $courses_id)->get();
    }
}
