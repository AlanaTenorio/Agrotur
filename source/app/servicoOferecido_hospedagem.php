<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicoOferecido_hospedagem extends Model
{
  public function hospedagem(){
    return $this->belongsTo('app\Hospedagem');
  }
}
