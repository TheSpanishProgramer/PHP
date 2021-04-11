<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Alumno;

class AlumnoTableSeeder extends Seeder
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


            $alumno = new Alumno;

            $alumno->name = $faker->firstname;
            $alumno->apellidos = $faker->lastname;
            $alumno->dni = $faker->randomNumber($nbDigits = 8) . $faker->randomLetter;
            $alumno->cp = $faker->postcode;
            $alumno->poblacion = $faker->streetName;
            $alumno->provincia = $faker->city;
            $alumno->tfijo = '9' . $faker->randomNumber($nbDigits = 8);
            $alumno->movil = '6' . $faker->randomNumber($nbDigits = 8);
            $alumno->tutor = $faker->name;
            $alumno->active = '1';

            $alumno->save();

            if($alumno->save()){
                
            $alumno->clases()->attach(['clase_id' => $faker->numberBetween($min = 1, $max = 11)]);
            $alumno->clases()->attach(['clase_id' => $faker->numberBetween($min = 1, $max = 11)]);
                
            }
         	

         }
    }
}

