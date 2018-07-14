<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
  public function anuncio(){
    return $this->belongsTo('app\Anuncio');
  }
  public function imagem_Servico(){
    return $this->hasMany('app\Imagem_Servico');
  }
}
