<?php

namespace App\Validator;

use PhpSpec\Laravel\LaravelObjectBehavior;
use App\Servico;

class ServicoValidator{

  public static function validate($dados){

    $validator = \Validator::make($dados, Servico::$rules, Servico::$messages);

    if(!$validator->errors()->isEmpty()){
      throw new ValidationException($validator, $validator->errors());
    }

  }

}
