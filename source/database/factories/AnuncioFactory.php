<?php

use Faker\Generator as Faker;

$factory->define(App\Anuncio::class, function (Faker $faker) {
    return [
        'preco' => rand(50,200),
        'descricao' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'video' => 'https://www.youtube.com/embed/gXys423JvSI',
        'anunciante_id' => rand(1, DB::table('clientes')->count())
    ];
});
