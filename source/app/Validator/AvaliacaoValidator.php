<?php

namespace App\Validator;

use App\Avaliacao_Anuncio;
use App\Validator\ValidationException;

class AvaliacaoValidator{
  public static function validate($dados){
    $validator = \Validator::make($dados, Avaliacao_Anuncio::$rules, Avaliacao_Anuncio::$messages);

    $transacoes = self::verificarTransacao($dados['user_id'], $dados['anuncio_id']);

    if($transacoes == NULL){
      $validator->errors()->add('erroAutorização','Não é possível avaliar um anúncio antes de contratá-lo');
    } else {
      $avaliacoes = self::verificarAvaliacao($dados['user_id'], $dados['anuncio_id']);
      if($avaliacoes != NULL){
        $validator->errors()->add('erroAutorização','Não é possível avaliar novamente este anúncio');
      }
    }

    if(!$validator->errors()->isEmpty()){
      throw new ValidationException($validator, $validator->errors());
    }
  }

  public static function verificarTransacao($cliente_id, $anuncio_id){
    $transacoes = \App\Transacao::where('anuncio_id', '=', $anuncio_id)->where('cliente_id', '=', $cliente_id)->first();
    return $transacoes;
  }

  public static function verificarAvaliacao($cliente_id, $anuncio_id){
    $avaliacoes = \App\Avaliacao_Anuncio::where('anuncio_id', '=', $anuncio_id)->where('cliente_id', '=', $cliente_id)->first();
    return $avaliacoes;
  }

}
