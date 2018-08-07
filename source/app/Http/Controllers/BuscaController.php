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


        $hospedagens = \App\Anuncio::whereHas('endereco', function ($query) {
            $query->where('cidade', 'ilike', \Request::get('termo'));
        })->orwhereHas('endereco', function ($query) {
            $query->where('cep', 'ilike', \Request::get('termo'));
        })->orwhereHas('endereco', function ($query) {
            $query->where('estado', 'ilike', \Request::get('termo'));
        })->orwhereHas('hospedagem', function ($query) {
            $query->where('nomePropriedade', 'ilike', \Request::get('termo'));
        })->orwhereHas('hospedagem', function ($query) {
            $query->where('nomePropriedade', 'ilike', \Request::get('termo'));
        })->get();

        $servicos = \App\Anuncio::whereHas('servico', function ($query) {
            $query->where('nomeServico', 'ilike', \Request::get('termo'));
        })->get();

        $endereco_ids = \DB::table('servico_oferecido_hospedagems')->where('servico', 'ilike', 
            $request->termo)->pluck('hospedagem_id');
        $servicosh = \App\Hospedagem::whereIn('id', $endereco_ids)->get();

        $hospedagensVal = \App\Anuncio::where('preco', '<', 101)->get();

            
         /*= \App\servicoOferecido_hospedagem::where('servico', 'ilike', $request->termo)->get();*/




        //has('endereco.cidade', 'ilike', 'garanhuns')->get();
        //var_dump($hospedagens->count());
        //return "$request->termo";  

        //$hospedagens = \App\Hospedagem::where('nomePropriedade', 'ilike', $request->termo)->get();


        
         

        //->get() or where('estado', '=', $termo)->get() or where('bairro', '=', $termo)->get() or where('rua', '=', $termo)->get();

        
        return view("ExibirBusca", ['servicosh' => $servicosh,
                                      'hospedagens' => $hospedagens,
                                      'servicos' => $servicos]);
    }
}
