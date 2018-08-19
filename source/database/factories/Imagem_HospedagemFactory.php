<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement4();

$factory->define(App\Imagem_Hospedagem::class, function (Faker $faker) use ($autoIncrement){
  $autoIncrement->next();
  $dir = '/images/hospedagens/'.$autoIncrement->current();

  return [
      'imagem' => $faker->image($dir,400,300),
      'hospedagem_id' => $autoIncrement->current()
  ];
});

function autoIncrement4()
{
    for ($i = 0; $i <= 50; $i++) {
        yield $i;
    }
}
