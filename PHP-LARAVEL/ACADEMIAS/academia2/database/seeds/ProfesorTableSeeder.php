<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Profesor;

class ProfesorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();

         for ($i=0; $i < 50 ; $i++) {

         	Profesor::create(['name' =>$faker->firstname,
         					'apellidos' =>$faker->lastname,
         					'dni' =>$faker->randomNumber($nbDigits = 8) . $faker->randomLetter,
         					'cp' =>$faker->postcode,
         					'poblacion' =>$faker->streetName,
         					'provincia' =>$faker->city,
         					'tfijo' =>'9' . $faker->randomNumber($nbDigits = 8),
         					'movil' =>'6' . $faker->randomNumber($nbDigits = 8),
                            'active' => '1']);

         }
    }
}
