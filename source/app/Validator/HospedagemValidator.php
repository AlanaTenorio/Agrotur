<?php

namespace App\Validator;

use PhpSpec\Laravel\LaravelObjectBehavior;
use App\Hospedagem;
use App\Validator\AnuncioValidator;
use App\Validator\EnderecoValidator;

class HospedagemValidator{

  public static function validate($dados){

    $validator = \Validator::make($dados, Hospedagem::$rules, Hospedagem::$messages);

    if(!$validator->errors()->isEmpty()){
      throw new ValidationException($validator, $validator->errors());
    }

    AnuncioValidator::validate($dados);
    EnderecoValidator::validate($dados);

  }

}
