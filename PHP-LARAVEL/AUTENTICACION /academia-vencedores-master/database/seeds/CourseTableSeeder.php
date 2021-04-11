<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Psicométrico',
            'description' => ''
        ]);

        Course::create([
            'name' => 'Raz. Matemático',
            'description' => ''
        ]);

        Course::create([
            'name' => 'Raz. Verbal',
            'description' => ''
        ]);
    }
}
