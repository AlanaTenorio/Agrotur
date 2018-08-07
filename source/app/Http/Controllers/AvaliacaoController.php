<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Validator\AvaliacaoValidator;

class AvaliacaoController extends Controller
{
    public function avaliarAnuncio(Request $request){

      try{
        AvaliacaoValidator::validate($request->all());
        $avaliacaoAnuncio = new \App\Avaliacao_Anuncio();
        $avaliacaoAnuncio->cliente_id = $request->user_id;
        $avaliacaoAnuncio->anuncio_id = $request->anuncio_id;
        $avaliacaoAnuncio->nota = $request->nota;
        $avaliacaoAnuncio->comentario = $request->comentario;
        $avaliacaoAnuncio->save();
        return back();
      }catch(\App\Validator\ValidationException $e){
        return back()->withErrors($e->getValidator())
                    ->withInput();
      }

    }

}
