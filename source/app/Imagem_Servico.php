<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem_Servico extends Model
{
  public function servico(){
    return $this->belongsTo('app\Servico');
  }
}
