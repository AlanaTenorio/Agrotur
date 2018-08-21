<?php

use Faker\Generator as Faker;

// $autoIncrement = autoIncrement4();

$factory->define(App\Imagem_Hospedagem::class, function (Faker $faker) { //use ($autoIncrement){
  static $increment = 1;

  $dir = 'public/images/hospedagens/'.$increment.'/';

  if(!file_exists($dir)){
      mkdir($dir, 0777);
  }
  $images = array('https://thumbcdn-0.hotelurbano.net/i0TbjAse0uZakFwgav_IG7kbwG4=/620x338/https%3A//d1wawz8va1fvss.cloudfront.net/reservas/prod0/0/598/555cb270787b8_HU-hotel-fazenda-eco-resort-3-pinheiros-engenheiro-passos-resende-RJ-022.jpg',
                  'https://img.stpu.com.br/?img=https://s3.amazonaws.com/pu-mgr/default/a0R0f00000uEIRREA4/5a37bdf8e4b0de92cddb6f12.jpg&w=620&h=400',
                  'https://hotelfazendaflorestadolago.com.br/images/tarifario/floresta-do-lago-hotel-fazenda-precos.jpg');
  $image = file_get_contents( $images[(rand(0,2))] );


  file_put_contents($dir.'farm.jpg', $image);

  $dir = str_ireplace("public/", "", $dir);
  $dir = $dir.'farm.jpg';

  return [
      'imagem' => str_ireplace("public/", "", $dir),
      'hospedagem_id' => $increment++
  ];
});

// function autoIncrement4()
// {
//     for ($i = 0; $i <= 50; $i++) {
//         yield $i;
//     }
// }
