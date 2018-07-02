<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem_Hospedagem extends Model
{
    public function hospedagem(){
      return $this->belongsTo('app\Hospedagem');
    }
}
