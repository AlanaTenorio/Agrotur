<?php

namespace App\Validator;

use PhpSpec\Laravel\LaravelObjectBehavior;
use App\Endereco;

class EnderecoValidator{

  public static function validate($dados){

    $validator = \Validator::make($dados, Endereco::$rules, Endereco::$messages);

    if(!$validator->errors()->isEmpty()){
      throw new ValidationException($validator, $validator->errors());
    }

  }

}
