<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::truncate();

        $subject = new Subject();
        $subject->name = 'Lengua';
        $subject->category_id = 4;
        $subject->user_id = 2;
        $subject->matricula = str_random(10);
        $subject->save();
        $subject->slug = str_slug($subject->name) . '-' . $subject->id;
        $subject->save();


        $subject = new Subject();
        $subject->name = 'Matematicas';
        $subject->category_id = 4;
        $subject->user_id = 2;
        $subject->matricula = str_random(10);
        $subject->save();
        $subject->slug = str_slug($subject->name) . '-' . $subject->id;
        $subject->save();

        for ($i = 6; $i <= 21; $i++) {
            $subject = new Subject();
            $subject->name = 'Lengua';
            $subject->category_id = $i;
            $subject->user_id = 10;
            $subject->matricula = str_random(10);
            $subject->save();
            $subject->slug = str_slug($subject->name) . '-' . $subject->id;
            $subject->save();

            $subject = new Subject();
            $subject->name = 'Matematicas';
            $subject->category_id = $i;
            $subject->user_id = 10;
            $subject->matricula = str_random(10);
            $subject->save();
            $subject->slug = str_slug($subject->name) . '-' . $subject->id;
            $subject->save();
        }

    }
}
