<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
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
