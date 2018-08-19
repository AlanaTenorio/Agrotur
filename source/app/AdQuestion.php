<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AdQuestion extends Model
{
    protected $fillable = ['question', 'answer', 'ad_id', 'client_id'];

    public static $rules = [
        'question' => 'required',
        'ad_id' => 'required',
        'client_id' => 'required'
    ];

    public function client(){
        return $this->belongsToOne('app\Cliente');
    }
  
    public function ad(){
        return $this->belongsToOne('app\Anuncio');
    }
}
?>
