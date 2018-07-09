<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
  public function hospedagem(){
    return $this->hasOne('app\Hospedagem');
  }

  public function endereco(){
    return $this->hasOne('app\Endereco');
  }
}
