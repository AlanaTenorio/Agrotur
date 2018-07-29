<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function avaliarAnuncio(Request $request){
      $avaliacaoAnuncio = new \App\Avaliacao_Anuncio();

      $transacoes = $this->verificarTransacao($request->cliente_id, $request->anuncio_id);
      //return var_dump($transacoes);
      if(sizeof($transacoes) == 0){
        throw new \Exception("Não é possível avaliar um anúncio antes de contratá-lo", 1);

      } else {
        $avaliacoes = $this->verificarAvaliacao($request->cliente_id, $request->anuncio_id);
        if(sizeof($avaliacoes) > 0){
          throw new \Exception("Não é possível avaliar novamente este anúncio", 1);
        }
        $avaliacaoAnuncio->cliente_id = $request->cliente_id;
        $avaliacaoAnuncio->anuncio_id = $request->host_id;
        $avaliacaoAnuncio->nota = $request->nota;
        $avaliacaoAnuncio->comentario = $request->comentario;
        $avaliacaoAnuncio->save();
        return back();
      }
    }

    public function verificarTransacao($cliente_id, $anuncio_id){
      $transacoes = \App\Transacao::where('anuncio_id', '=', $anuncio_id)->where('cliente_id', '=', $cliente_id)->get();
      return $transacoes;
    }

    public function verificarAvaliacao($cliente_id, $anuncio_id){
      $avaliacoes = \App\Avaliacao_Anuncio::where('anuncio_id', '=', $anuncio_id)->where('cliente_id', '=', $cliente_id)->get();
      return $avaliacoes;
    }

}
