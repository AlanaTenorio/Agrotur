<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
    	'nome' => $faker->name,
		'senha' => $faker->password,
		'telefone' => $faker->phoneNumber,
		'cpf' => $faker->cpf,
		'email' => $faker->unique()->safeEmail,
    ];
});
