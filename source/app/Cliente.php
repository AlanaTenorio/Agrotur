<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  public function favorito(){
    return $this->hasMany('app\Favorito');
  }
}
