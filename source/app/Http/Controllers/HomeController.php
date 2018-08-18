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
      $recomendados = $this->recomendar();

      return view('Home',["anuncios"=>$anuncios,
                          "recomendados"=>$recomendados]);
    }

    private function recomendar() {
      if (Auth::guard()->check()) {
        $anuncios = Anuncio::inRandomOrder()->take(8)->get();
        return $anuncios;
      }else{
        $anuncios = Anuncio::inRandomOrder()->take(8)->get();
        return $anuncios;
      }

    }
}
