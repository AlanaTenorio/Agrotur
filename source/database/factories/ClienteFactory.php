<?php

use Faker\Generator as Faker;

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
