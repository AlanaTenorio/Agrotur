<?php

namespace App\Validator;

use DateTime;
use App\AdQuestion;
use App\Validator\ValidationException;

class QuestionsValidator
{
    public static function validateQuestion ($data)
    {
        $validator = \Validator::make($data, AdQuestion::$rules, AdQuestion::$messages);
     
        try {
            \App\Anuncio::findOrFail($data['ad_id']);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $validator->errors()->add('ad_error','O id de anúncio não corresponde a nenhum anúncio da base de dados.');
        }
        
        try {
            \App\Cliente::findOrFail($data['client_id']);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $validator->errors()->add('client_error','O id de cliente não corresponde a nenhum cliente da base de dados.');
        }

        /*
        foreach (validateQuestionContent($data['question']) as $error) {
            $validator->errors()->add('question_error', $error);
        }
        */

        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, $validator->errors());
        }
    }

    /*
    * Retorna um array discriminando as violações cometidas na questão
    */
    public static function validateQuestionContent ($text)
    {
        //futuramente, adicionar restrições ao texto
        return Array();
    }
    
    public static function validateAnswer ($data)
    {
        $validator = \Validator::make($data, [], []);
     
        try {
            \App\Anuncio::findOrFail($data['ad_id']);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $validator->errors()->add('ad_error','O id de anúncio não corresponde a nenhum anúncio da base de dados.');
        }
        
        try {
            \App\Cliente::findOrFail($data['seller_id']);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $validator->errors()->add('seller_error','O id de vendedor não corresponde a nenhum vendedor da base de dados.');
        }

        if (\App\Anuncio::find($data['ad_id'])->anunciante_id != $data['seller_id']) {
            $validator->errors()->add('seller_error','O anúncio não pertence ao vendedor.');
        }

        
        if (isEmpty($data['answer'])) {
            $validator->errors()->add('answer_error','A resposta não pode estar vazia.');
        }

        /*
        foreach (validateAnswerContent($data['answer']) as $error) {
            $validator->errors()->add('answer_error', $error);
        }
        */

        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, $validator->errors());
        }
    }
    
    /*
    * Retorna um array discriminando as violações cometidas na resposta
    */
    public static function validateAnswerContent ($text)
    {
        //futuramente, adicionar restrições ao texto
        return Array();
    }
}
?>
