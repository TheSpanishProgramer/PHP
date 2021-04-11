<?php

use App\Teacher;
use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'name' => 'Carlos',
            'lastName' => 'Rodríguez',
            'dni' => '76474855',
            'address' => 'Los Nardos',
            'sex' => 'M',
            'email' => '',
            'phone' => ''
        ]);
    }
}
