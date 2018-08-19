<?php

use Faker\Generator as Faker;

$factory->define(App\Transacao::class, function (Faker $faker) {
    $dataEntrada = $faker->date($format = 'd-m-Y', $max = 'now');
    $dataSaida = date('d/m/Y', strtotime("+4 days",strtotime($dataEntrada)));

    $anuncio_id = rand(1, DB::table('anuncios')->count());
    $ad = DB::table('anuncios')->where('id', $anuncio_id)->first();
    $qtdPessoas = rand(1,4);
    $precoTotal = $ad->preco*$qtdPessoas;

    return [
        'dataEntrada' => $dataEntrada,
        'dataSaida' => $dataSaida,
        'precoTotal' => $precoTotal,
        'quantPessoas' => $qtdPessoas,
        'anuncio_id' => $anuncio_id,
        'cliente_id' => rand(1, DB::table('clientes')->count())
    ];
});
