<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
  public function anuncio(){
    return $this->belongsTo('App\Anuncio');
  }
  public function imagem_Servico(){
    return $this->hasMany('App\Imagem_Servico');
  }
}
