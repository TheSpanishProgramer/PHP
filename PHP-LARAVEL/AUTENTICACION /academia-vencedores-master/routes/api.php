<?php

use App\Student;
use Symfony\Component\HttpFoundation\Request;

Route::get('/student', function (Request $request) {
    return Student::where('dni', $request->input('dni'))->first();
});

Route::get('/student/courses', function (Request $request) {
    $student = Student::find($request->input('id'));
    $last_enrollment = $student->last_enrollment;
    if ($last_enrollment) {
        return $last_enrollment->selected_courses;
    } else {
        return [];
    }
});

Route::get('/students', 'Api\ReportController@students');
Route::get('/courses', 'Api\ReportController@courses');
Route::get('/levels', 'Api\ReportController@levels');
