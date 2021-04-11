<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'name' => 'Juan',
            'lastName' => 'Ramos',
            'dni' => '76474871',
            'address' => 'Los Rosales',
            'sex' => 'M',
            'email' => '',
            'phone' => '',
            'attorney' => ''
        ]);
    }
}
