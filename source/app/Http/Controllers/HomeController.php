<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function home() {
      $anuncios = Anuncio::inRandomOrder()->take(10)->get();
      return view('Home',["anuncios"=>$anuncios]);
    }
}
