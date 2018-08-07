<?php

namespace App\Validator;

use App\Cliente;
use App\Validator\ValidationException;

class ClienteValidator{
  public static function validate($dados){
    $validator = \Validator::make($dados, Cliente::$rules, Cliente::$messages);

    if(!$validator->errors()->isEmpty()){
      throw new ValidationException($validator, $validator->errors());
    }
  }
}
