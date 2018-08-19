<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use Auth;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function home() {
      $anuncios = Anuncio::inRandomOrder()->take(8)->get();
      $recomendados = $this->recomendarPorCategoria();
      return view('Home',["anuncios"=>$anuncios,
                          "recomendados"=>$recomendados]);
    }

    private function recomendarPorCategoria() {
      $categorias = array();
      if (Auth::guard()->check()) {
        $clienteId = Auth::user()->id;

        $compras = \App\Transacao::where('cliente_id', '=', $clienteId)->get();
        if($compras->isEmpty()){
          return $this->recomendarAleatorio();
        }
        foreach ($compras as $compra) {
          $servico = \App\Servico::where('anuncio_id', '=', $compra->anuncio_id)->first();
          if($servico == NULL){
            return $this->recomendarAleatorio();
          }
          array_push($categorias, $servico->categoria);
        }

        $conta = array_count_values($categorias);
        arsort($conta);
        $categoria = key($conta);

        $servicos = \App\Servico::where('categoria', '=', $categoria)->get();

        $anuncios = array();
        foreach ($servicos as $servico) {
          $anuncio = \App\Anuncio::where('id', '=', $servico->anuncio_id)->first();
          array_push($anuncios, $anuncio);
        }
        return $anuncios;
      }else{
        return $this->recomendarAleatorio();
      }

    }
    private function recomendarAleatorio(){
      $anuncios = Anuncio::inRandomOrder()->take(8)->get();
      return $anuncios;
    }
}
