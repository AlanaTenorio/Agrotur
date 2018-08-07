<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
    	'nome' => $faker->name,
  		'senha' => $faker->password,
  		'telefone' => '12345678901',
  		'cpf' => $faker->cpf,
  		'email' => $faker->unique()->safeEmail,
    ];
});
