<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Endereco;

class BuscaController extends Controller
{
    public function getView(){
        return view('Busca');
    }
    public function buscaAnuncio(Request $request){

        //$hospedagens = \App\Anuncio::whereHas('endereco.cidade', 'ilike', 'garanhuns')->get();

        /*$endereco_ids = \DB::table('enderecos')->where('cidade', 'ilike', 
            $request->termo)->pluck('anuncio_id');
        $hospedagens = \App\Anuncio::whereIn('id', $endereco_ids)->get();
        var_dump($hospedagens->count());
        return "";*/

        \Auth::user()->id;

        $hospedagens = \App\Anuncio::whereHas('endereco', function ($query) {
            $query->where('cidade', 'ilike', \Request::get('termo'));
        })->get();



        //has('endereco.cidade', 'ilike', 'garanhuns')->get();
        //var_dump($hospedagens->count());
        //return "$request->termo";  

        //$hospedagens = \App\Hospedagem::where('nomePropriedade', 'ilike', $request->termo)->get();

        $enderecos = \App\Endereco::where('cidade', 'ilike', $request->termo)
                            ->orWhere("estado", 'ilike', $request->termo)->get();

        $servicosh = \App\servicoOferecido_hospedagem::where('servico', 'ilike', $request->termo)->get();

        $servicos = \App\Servico::where('nomeServico', 'ilike', $request->termo)->get();
         

        //->get() or where('estado', '=', $termo)->get() or where('bairro', '=', $termo)->get() or where('rua', '=', $termo)->get();

        
        return view("ExibirBusca", ['servicosh' => $servicosh,
                                    'servicos' => $servicos,
                                      'hospedagens' => $hospedagens,
                                      'enderecos' => $enderecos]);
    }
}
