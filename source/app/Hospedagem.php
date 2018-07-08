<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospedagem extends Model
{
  public function anuncio(){
    return $this->belongsTo('app\Anuncio');
  }
  public function imagem_Hospedagem(){
    return $this->hasMany('app\Imagem_Hospedagem');
  }
  public function servico_oferecido_Hospedagem(){
    return $this->hasMany('app\servicoOferecido_hospedagem');
  }
}
