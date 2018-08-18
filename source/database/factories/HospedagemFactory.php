<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement1();

$factory->define(App\Hospedagem::class, function (Faker $faker) use ($autoIncrement){
  $autoIncrement->next();
  return [
      'nomePropriedade' => $faker->company,
      'anuncio_id' => $autoIncrement->current()
  ];
});

function autoIncrement1()
{
    for ($i = 0; $i <= 50; $i++) {
        yield $i;
    }
}
