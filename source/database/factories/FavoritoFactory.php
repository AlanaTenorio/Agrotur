<?php

use Faker\Generator as Faker;

// $autoIncrement = autoIncrement6();

$factory->define(App\Favorito::class, function (Faker $faker){// use ($autoIncrement){
    // $autoIncrement->next();
    static $increment = 1;

    return [
        'anuncio_id' => rand(1, DB::table('anuncios')->count()),
        'cliente_id' => $increment++//->current()
    ];
});

// function autoIncrement6()
// {
//     for ($i = 0; $i <= 50; $i++) {
//         yield $i;
//     }
// }
