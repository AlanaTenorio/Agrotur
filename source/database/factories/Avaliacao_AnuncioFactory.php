<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement7();

$factory->define(App\Avaliacao_Anuncio::class, function (Faker $faker) use ($autoIncrement){
    $autoIncrement->next();

    return [
        'nota' => rand(1,5),
        'comentario' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'anuncio_id' => rand(1, DB::table('anuncios')->count()),
        'cliente_id' => $autoIncrement->current()
    ];
});

function autoIncrement7()
{
    for ($i = 0; $i <= 50; $i++) {
        yield $i;
    }
}
