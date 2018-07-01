<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem_Serviço extends Model
{
  public function servico(){
    return $this->belongsTo('app\Serviço');
  }
}
