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
      $clienteId = Auth::user()->id;
      if (Auth::guard()->check()) {
        $compras = \App\Transacao::where('cliente_id', '=', $clienteId)->get();
        foreach ($compras as $compra) {
          $servico = \App\Servico::where('anuncio_id', '=', $compra->anuncio_id)->first();
          array_push($categorias, $servico->categoria);
        }

        $conta = array_count_values($categorias);
        arsort($conta);
        $categoria = key($conta);

        $anuncios = \App\Servico::where('categoria', '=', $categoria)->get();

        return $anuncios;
      }else{
        $anuncios = Anuncio::inRandomOrder()->take(8)->get();
        return $anuncios;
      }

    }
}
