<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  public function favorito(){
    return $this->hasMany('app\Favorito');
  }

  public function avaliacao_anuncios(){
    return $this->hasMany('app\Avaliacao_Anuncio');
  }
}
