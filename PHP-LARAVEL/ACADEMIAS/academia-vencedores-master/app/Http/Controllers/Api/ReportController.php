<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Enrollment;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function students()
    {
        $students = Student::all();
        $maleCount = 0;
        $femaleCount = 0;

        foreach ($students as $student) {
            if ($student->sex == 'M')
                ++$maleCount;
            else ++$femaleCount;
        }

        $data['male'] = $maleCount;
        $data['female'] = $femaleCount;
        return $data;
    }

    public function courses()
    {
        $enrollments = Enrollment::all();
        $courses = Course::all();

        $names = [];
        $counts = [];


        foreach ($courses as $course) {
            $count = 0;
            $names[] = $course->name;

            foreach ($enrollments as $enrollment) {
                $selected_courses_id = explode(',', $enrollment->courses);
                if (in_array($course->id, $selected_courses_id))
                    ++$count;
            }

            $counts[] = $count;
        }

        $data['names'] = $names;
        $data['counts'] = $counts;
        return $data;
    }

    public function levels()
    {
        $enrollments = Enrollment::all();

        $counts = [0, 0, 0];

        foreach ($enrollments as $enrollment) {
            if ($enrollment->level == 'Básico')
                ++$counts[0];
            else if ($enrollment->level == 'Intermedio')
                ++$counts[1];
            else if ($enrollment->level == 'Avanzado')
                ++$counts[2];
        }

        $data['names'] = ['Básico', 'Intermedio', 'Avanzado'];
        $data['counts'] = $counts;
        return $data;
    }
}
