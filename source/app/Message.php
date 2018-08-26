<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Message extends Model
{
    protected $fillable = ['text', 'ad_id', 'sender_id', 'recipient_id', 'b_read'];

    public static $rules = [
        'text' => 'required',
        'ad_id' => 'required|integer',
        'sender_id' => 'required|integer',
        'recipient_id' => 'required|integer',
        'b_read' => 'boolean',
    ];

    public static $messages = [
        'text.required' => '"text" field can\'t be left empty!',
        'ad_id.required' => '"ad_id" field can\'t be left empty!',
        'ad_id.integer' => '"ad_id" value must be integer!',
        'sender_id.required' => '"sender_id" field can\'t be left empty!',
        'sender_id.integer' => '"sender_id" value must be integer!',
        'recipient_id.required' => '"recipient_id" field can\'t be left empty!',
        'recipient_id.integer' => '"recipient_id" value must be integer!',
        'b_read.boolean' => '"b_read" value must be boolean!',
    ];
  
    public function ad_id(){
        return $this->belongsToOne('app\Anuncio');
    }

    public function sender_id(){
        return $this->belongsToOne('app\Cliente');
    }
  
    public function recipient_id(){
        return $this->belongsToOne('app\Cliente');
    }
}
?>
