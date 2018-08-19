<?php

namespace App\Validator;

use PhpSpec\Laravel\LaravelObjectBehavior;
use App\Transacao;

class TransacaoValidator{

  public static function validate($dados){

    $validator = \Validator::make($dados, Transacao::$rules, Transacao::$messages);

    if(!$validator->errors()->isEmpty()){
      throw new ValidationException($validator, $validator->errors());
    }

  }

}
