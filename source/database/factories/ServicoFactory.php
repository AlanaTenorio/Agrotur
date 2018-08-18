<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement2();

$factory->define(App\Servico::class, function (Faker $faker) use ($autoIncrement){
  $autoIncrement->next();
  $category = array("Esporte", "Gastronomia", "Trilha", "Outros");
  return [
      'nomeServico' => $faker->word,
      'anuncio_id' => $autoIncrement->current(),
      'categoria' => $category[rand(0,3)]
  ];
});

function autoIncrement2()
{
    for ($i = 50; $i <= 100; $i++) {
        yield $i;
    }
}
