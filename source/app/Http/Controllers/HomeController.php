<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\Servico;
use App\Transacao;
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

        $compras = Transacao::where('cliente_id', '=', $clienteId)->get();
        if($compras->isEmpty()){
          return $this->recomendarAleatorio();
        }
        foreach ($compras as $compra) {
          $servico = Servico::where('anuncio_id', '=', $compra->anuncio_id)->first();
          if($servico == NULL){
            return $this->recomendarAleatorio();
          }
          array_push($categorias, $servico->categoria);
        }

        $conta = array_count_values($categorias);
        arsort($conta);
        $categoria = key($conta);

        $servicos = Servico::where('categoria', '=', $categoria)->take(8)->get();

        $anuncios = array();
        foreach ($servicos as $servico) {
          $anuncio = Anuncio::where('id', '=', $servico->anuncio_id)->first();
          array_push($anuncios, $anuncio);
        }
        return $anuncios;
      }else{
        return $this->recomendarAleatorio();
      }
    }

    private function recomendarAleatorio(){
      $servicos = Servico::inRandomOrder()->take(8)->get();

      $anuncios = array();
      foreach ($servicos as $servico) {
        $anuncio = Anuncio::where('id', '=', $servico->anuncio_id)->first();
        array_push($anuncios, $anuncio);
      }

      return $anuncios;
    }
}
