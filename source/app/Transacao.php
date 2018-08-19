<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{

  public static $rules = [
    'dataEntrada'=>'required|after:today',
    'dataSaida'=>'required|after:dataEntrada',
    'quantPessoas'=>'required|numeric',
  ];

  public static  $messages = [
    'dataEntrada.required' => 'Selecione uma data de entrada',
    'dataSaida.required' => 'Selecione uma data de saída',
    'quantPessoas.numeric' => 'Este valor deve ser um número',
    'quantPessoas.required' => 'Informe a quantidade de pessoas',
    'dataEntrada.after' => 'Data de entrada inválida',
    'dataSaida.after' => 'A data de saída deve ser após a data de entrada',
  ];

  public function cliente(){
    return $this->hasOne('app\Cliente');
  }

  public function anuncio(){
    return $this->hasOne('app\Anuncio');
  }
}
