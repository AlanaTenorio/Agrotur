<?php

use Faker\Generator as Faker;

$factory->define(App\servicoOferecido_hospedagem::class, function (Faker $faker) {
    return [
      'servico' => $faker->word,
      'hospedagem_id' => rand(1, DB::table('hospedagems')->count())
    ];
});
