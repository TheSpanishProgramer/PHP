<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('123456'),
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    $company = $faker->company;

    return [
        'cnpj' => $faker->cnpj(false),
        'company_name' => $company . ' S/A',
        'commercial_name' => $company,
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    $company = $faker->company;

    return [
        'cpf_cnpj' => $faker->cnpj(false),
        'name' => $company . ' S/A',
        'phone' => $faker->landlineNumber(false),
        'cellphone' => $faker->cellphoneNumber(false),
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text($maxNbChars = 200),
        'date_time' => date('Y-m-d H:i:s')
    ];
});

$factory->define(App\Address::class, function (Faker\Generator $faker) {
    $bairro = ['Nossa Senhora', 'Igrejinha', 'Centro',
        'Novo Horizonte', 'Alto da Aparecida', 'Sapucaia', 'Ayrton Senna'];
    $complemento = ['Fundos', 'Ap 102', 'Ap 503', 'Térreo', 'Segundo pavimento', 'Loja 3'];

    return [
        'street' => $faker->streetName,
        'neighborhood' => $bairro[mt_rand(0, 6)],
        'cep' => mt_rand(11111111, 99999999),
        'number' => $faker->buildingNumber,
        'complement' => $complemento[mt_rand(0, 5)],
    ];
});
