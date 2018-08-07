<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

  protected $fillable = [ 'anuncio_id', 'cidade', 'estado', 'rua', 'numero', 'bairro', 'cep', 'complemento'];

  public static $messages = [
      'lodging_municipality.required' => 'Insira a cidade no endereço do anúncio',
      'lodging_state.required' => 'Selecione um estado',
      'lodging_street.required' => 'Insira a rua no endereço do anúncio',
      'lodging_street_number.required' => 'Insira o número no endereço do anúncio',
      'lodging_street_neighbourhood.required' => 'Insira o bairro no endereço do anúncio',
      'lodging_postal_code.required' => 'Insira um CEP válido',
      'lodging_postal_code.digits' => 'Insira um CEP válido',
  ];

  public static $rules = [
    'lodging_municipality'=>'required',
    'lodging_state'=>'required',
    'lodging_street'=>'required',
    'lodging_street_number'=>'required',
    'lodging_neighbourhood'=>'required',
    'lodging_postal_code'=>'required|digits:8',
  ];

  public function anuncio(){
    return $this->belongsTo('app\Anuncio');
  }
}
