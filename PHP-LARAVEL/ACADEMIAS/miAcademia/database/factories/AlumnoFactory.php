<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Metemos los datos generandolos con el faker
            'nombre'=>$this->faker->firstName,
            'apellidos'=>$this->faker->lastName." ".$this->faker->lastName,
            'email'=>$this->faker->unique()->safeEmail,
            'telefono'=>$this->faker->optional()->phoneNumber
        ];
    }
}
