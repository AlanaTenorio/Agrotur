<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

  protected $fillable = [ 'anuncio_id', 'cidade', 'estado', 'rua', 'numero', 'bairro', 'cep', 'complemento'];

  public static $messages = [
      'cidade.required' => 'Insira a cidade no endereço do anúncio',
      'estado.required' => 'Selecione um estado',
      'rua.required' => 'Insira a rua no endereço do anúncio',
      'numero.required' => 'Insira o número no endereço do anúncio',
      'bairro.required' => 'Insira o bairro no endereço do anúncio',
      'cep.required' => 'Insira um CEP válido',
      'cep.digits' => 'Insira um CEP válido',
  ];

  public static $rules = [
    'cidade'=>'required',
    'estado'=>'required',
    'rua'=>'required',
    'numero'=>'required',
    'bairro'=>'required',
    'cep'=>'required|digits:8',
  ];

  public function anuncio(){
    return $this->belongsTo('app\Anuncio');
  }
}
