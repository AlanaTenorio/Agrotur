<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  public function favorito(){
    return $this->hasMany('App\Favorito');
  }

  public function avaliacao_anuncios(){
    return $this->hasMany('App\Avaliacao_Anuncio');
  }
}
