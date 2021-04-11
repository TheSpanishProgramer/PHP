<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6, true),
        'contenido' => $faker->paragraph,
        'document_id' => $faker->numberBetween(1,10),
        'user_id' => $faker->numberBetween(5,12),
        'created_at' => \Carbon\Carbon::parse($faker->dateTimeBetween('-2 years', '-1 months', null)->format('Y-m-d H:i:s'))
    ];
});
