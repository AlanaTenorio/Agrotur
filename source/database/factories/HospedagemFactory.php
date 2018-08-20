<?php

use Faker\Generator as Faker;

// $autoIncrement = autoIncrement1();

$factory->define(App\Hospedagem::class, function (Faker $faker){ //use ($autoIncrement){
  // $autoIncrement->next();

  static $increment = 1;

  return [
      'nomePropriedade' => $faker->company,
      'anuncio_id' => $increment++
  ];
});

// function autoIncrement1()
// {
//     for ($i = 0; $i <= 50; $i++) {
//         yield $i;
//     }
// }
