<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Cliente::class, function (Faker $faker) {

    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'senha' => Hash::make('12345678'),
        'remember_token' => str_random(10),
        'telefone' => $faker->phoneNumberCleared,
        'cpf' => $faker->cpf,
    ];
});
