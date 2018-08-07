<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{

  protected $fillable = ['descricao', 'anunciante_id', 'preco'];

  public static $messages = [
    'lodging_description.required' => 'Insira uma descrição do anúncio',
    'lodging_price.numeric' => 'Este valor deve ser um número',
    'lodging_price.required' => 'Insira o preço deste anúncio',
  ];

  public static $rules = [
    'lodging_description'=>'required',
    'lodging_price'=>'required|numeric',
  ];

  public function hospedagem(){
    return $this->hasOne('app\Hospedagem');
  }

  public function endereco(){
    return $this->hasOne('app\Endereco');
  }

  public function avaliacao_anuncios(){
    return $this->hasMany('app\Avaliacao_Anuncio');
  }
}
