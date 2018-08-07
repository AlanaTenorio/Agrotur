<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{

  public static $rules = [
    'service_description'=>'required',
    'service_title'=>'required',
    'service_price'=>'required|numeric',
    'service_municipality'=>'required',
    'service_state'=>'required',
    'service_street'=>'required',
    'service_street_number'=>'required',
    'service_neighborhood'=>'required',
    'service_postal_code'=>'required|digits:8',
  ];

  public static $messages = [
    'service_description.required' => 'Insira uma descrição do anúncio',
    'service_title.required' => 'Insira o título do anúncio',
    'service_price.numeric' => 'Este valor deve ser um número',
    'service_price.required' => 'Insira o preço deste anúncio',
    'service_municipality.required' => 'Insira a cidade no endereço do anúncio',
    'service_state.required' => 'Selecione um estado',
    'service_street.required' => 'Insira a rua no endereço do anúncio',
    'service_street_number.required' => 'Insira o número no endereço do anúncio',
    'service_street_neighborhood.required' => 'Insira o bairro no endereço do anúncio',
    'service_postal_code.required' => 'Insira um CEP válido',
    'service_postal_code.digits' => 'Insira um CEP válido',
  ];

  public function anuncio(){
    return $this->belongsTo('App\Anuncio');
  }
  public function imagem_Servico(){
    return $this->hasMany('App\Imagem_Servico');
  }
}
