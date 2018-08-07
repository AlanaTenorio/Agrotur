<?php

namespace App\Validator;

use PhpSpec\Laravel\LaravelObjectBehavior;
use App\Hospedagem;
use App\Validator\AnuncioValidator;
use App\Validator\EnderecoValidator;

class HospedagemValidator{

  public static function validate($dados){

    $validatorHospedagem = \Validator::make($dados, Hospedagem::$rules, Hospedagem::$messages);

    if(!$validatorHospedagem->errors()->isEmpty()){
      throw new ValidationException($validatorHospedagem, $validatorHospedagem->errors());
    }

    AnuncioValidator::validate($dados);
    EnderecoValidator::validate($dados);

  }

}
