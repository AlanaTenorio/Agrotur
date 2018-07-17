<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
  public function cliente(){
    return $this->hasOne('app\Cliente');
  }

  public function anuncio(){
    return $this->hasOne('app\Anuncio');
  }
}
