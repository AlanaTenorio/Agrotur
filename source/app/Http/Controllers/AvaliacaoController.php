<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class AvaliacaoController extends Controller
{
    public function avaliarAnuncio(Request $request){

      $messages = [
          'nota.required' => 'Insira uma nota pro anúncio',
          'nota.numeric' => 'A nota deve ser um número de 0 a 5',
      ];

      $validator = Validator::make($request->all(), [
        'nota'=>'required|numeric|between: 0, 5',
      ], $messages);

      if ($validator->fails()) {
          return back()
                      ->withErrors($validator)
                      ->withInput();
      }
      $avaliacaoAnuncio = new \App\Avaliacao_Anuncio();

      $transacoes = $this->verificarTransacao($request->user_id, $request->anuncio_id);

      if($transacoes == NULL){//TODO lidar com isso de outra forma
        //throw new \Exception("Não é possível avaliar um anúncio antes de contratá-lo", 1);
        return back();
      } else {
        $avaliacoes = $this->verificarAvaliacao($request->user_id, $request->anuncio_id);
        if($avaliacoes != NULL){
          //throw new \Exception("Não é possível avaliar novamente este anúncio", 1);
          return back();
        }
        $avaliacaoAnuncio->cliente_id = $request->user_id;
        $avaliacaoAnuncio->anuncio_id = $request->anuncio_id;
        $avaliacaoAnuncio->nota = $request->nota;
        $avaliacaoAnuncio->comentario = $request->comentario;
        $avaliacaoAnuncio->save();
        return back();
      }
    }

    public function verificarTransacao($cliente_id, $anuncio_id){
      $transacoes = \App\Transacao::where('anuncio_id', '=', $anuncio_id)->where('cliente_id', '=', $cliente_id)->first();
      return $transacoes;
    }

    public function verificarAvaliacao($cliente_id, $anuncio_id){
      $avaliacoes = \App\Avaliacao_Anuncio::where('anuncio_id', '=', $anuncio_id)->where('cliente_id', '=', $cliente_id)->first();
      return $avaliacoes;
    }

}
