<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public function anuncio(){
      return $this->belongsTo('app\Anuncio');
    }
}
