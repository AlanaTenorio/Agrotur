<?php

namespace App\Validator;

use DateTime;
use App\Message;
use App\Validator\ValidationException;

class MessageValidator
{
    public static function validateMessage ($data)
    {
        $validator = \Validator::make($data, Message::$rules, Message::$messages);
        
        try {
            \App\Anuncio::findOrFail($data['ad_id']);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $validator->errors()->add('ad_error','O id de anúncio não corresponde a nenhum anúncio da base de dados.');
        }
        
        try {
            \App\Cliente::findOrFail($data['sender_id']);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $validator->errors()->add('user_error','O id de usuário não corresponde a nenhum usuário da base de dados.');
        }

        try {
            \App\Cliente::findOrFail($data['recipient_id']);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $validator->errors()->add('user_error','O id de usuário não corresponde a nenhum usuário da base de dados.');
        }

        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, $validator->errors());
        }
    }
}
?>
