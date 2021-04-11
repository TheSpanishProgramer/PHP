<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Libro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=>$this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'descripcion'=>$this->faker->text($maxNbChars=120),
            'isbn'=>$this->faker->unique()->isbn13
        ];
    }
}
