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
    return $this->hasOne('App\Hospedagem');
  }

  public function servico(){
    return $this->hasOne('App\Servico');
  }

  public function endereco(){
    return $this->hasOne('App\Endereco');
  }

  public function avaliacao_anuncios(){
    return $this->hasMany('App\Avaliacao_Anuncio');
  }
}
