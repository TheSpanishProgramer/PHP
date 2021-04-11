<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Clase;

class ClaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();

         for ($i=0; $i < 25 ; $i++) {

         	Clase::create(['name' =>$faker->firstname,
         					'numero' =>$faker->randomNumber($nbDigits = 3),
         					'asignatura_id' =>$faker->numberBetween($min = 1, $max = 11),
         					'profesor_id' =>$faker->numberBetween($min = 1, $max = 50)]);

         }
    }
}
