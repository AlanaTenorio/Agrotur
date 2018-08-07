<?php

namespace App\Validator;

use PhpSpec\Laravel\LaravelObjectBehavior;
use App\Anuncio;

class AnuncioValidator{

  public static function validate($dados){

    $validator = \Validator::make($dados, Anuncio::$rules, Anuncio::$messages);

    if(!$validator->errors()->isEmpty()){
      throw new ValidationException($validator, $validator->errors());
    }

  }

}
