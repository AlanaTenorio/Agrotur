<?php

use Faker\Generator as Faker;

// $autoIncrement = autoIncrement2();

$factory->define(App\Servico::class, function (Faker $faker){// use ($autoIncrement){
  // $autoIncrement->next();
  static $increment = 51;

  $category = array("Esporte", "Gastronomia", "Trilha", "Outros");
  return [
      'nomeServico' => $faker->word,
      'anuncio_id' => $increment++,
      'categoria' => $category[rand(0,3)]
  ];
});

// function autoIncrement2()
// {
//     for ($i = 50; $i <= 100; $i++) {
//         yield $i;
//     }
// }
