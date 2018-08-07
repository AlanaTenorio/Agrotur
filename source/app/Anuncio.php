<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{

  protected $fillable = ['descricao', 'anunciante_id', 'preco', 'video'];

  public static $messages = [
    'descricao.required' => 'Insira uma descrição do anúncio',
    'preco.numeric' => 'Este valor deve ser um número',
    'preco.required' => 'Insira o preço deste anúncio',
  ];

  public static $rules = [
    'descricao'=>'required',
    'preco'=>'required|numeric',
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
