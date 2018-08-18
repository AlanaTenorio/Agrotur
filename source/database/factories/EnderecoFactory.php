<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement3();

$factory->define(App\Endereco::class, function (Faker $faker) use ($autoIncrement) {
    $autoIncrement->next();
    return [
        'cidade' => $faker->city,
        'estado' => $faker->stateAbbr,
        'rua' => $faker->streetName,
        'numero' => rand(1,500),
        'bairro' => $faker->streetName,
        'cep' => $faker->postcode,
        'anuncio_id' => $autoIncrement->current(),
    ];
});

function autoIncrement3()
{
    for ($i = 0; $i <= 100; $i++) {
        yield $i;
    }
}
