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
            'titulo'=>ucwords($this->faker->unique()->word()),
            'sinopsis'=>ucfirst($this->faker->text(250)),
            'stock'=>$this->faker->numberBetween($min = 0, $max = 100),
            'tema_id'=>$this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
