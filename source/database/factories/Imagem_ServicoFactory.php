<?php

use Faker\Generator as Faker;

// $autoIncrement = autoIncrement5();

$factory->define(App\Imagem_Servico::class, function (Faker $faker){ //use ($autoIncrement){
  // $autoIncrement->next();
  static $increment = 1;

  $dir = 'public/images/servicos/'.$increment.'/';

  if(!file_exists($dir)){
      mkdir($dir, 0777);
  }

  $images = array('http://www.portalagropecuario.com.br/wp-content/uploads/2011/12/portal-agropecuario-ordenha-manual-coleta-armazenamento-leite-250x165.jpg',
                  'https://www.melhoramiga.com.br/wp-content/uploads/2009/07/andar-de-cavalo.jpg',
                  'https://www.trilhaseaventuras.com.br/wp-content/uploads/2014/02/img_cocanha_07.jpg');
  $image = file_get_contents( $images[(rand(0,2))] );

  file_put_contents($dir.'service.jpg', $image);

  $dir = str_ireplace("public/", "", $dir);
  $dir = $dir.'service.jpg';

  return [
      'imagem' => str_ireplace("public/", "", $dir),
      'servico_id' => $increment++
  ];
});

// function autoIncrement5()
// {
//     for ($i = 0; $i <= 50; $i++) {
//         yield $i;
//     }
// }
