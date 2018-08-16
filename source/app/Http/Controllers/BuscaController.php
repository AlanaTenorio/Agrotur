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


        /*$endereco_ids = \DB::table('enderecos')->where('cidade', 'ilike', 
            $request->termo)->pluck('anuncio_id');
        $hospedagens = \App\Anuncio::whereIn('id', $endereco_ids)->get();
        var_dump($hospedagens->count());
        return "";*/

        $hospedagens = \App\Anuncio::where("preco", ">", 0);

        if($request->termo2 != NULL) {
         switch ($request->termo2) {
            case 0:
                $hospedagens = $hospedagens->whereBetween('preco', [0, 100] );
                break;
            case 1:
                $hospedagens = $hospedagens->whereBetween('preco', [101, 200] );
                break;
            case 2:
                $hospedagens = $hospedagens->whereBetween('preco', [201, 300] );
                break;
            case 3:
                $hospedagens = $hospedagens->whereBetween('preco', [301, 400] );
                break;
            case 4:
                $hospedagens = $hospedagens->whereBetween('preco', [401, 100000000] );
                break;
        }
        }

        if(\Request::get('termo') != NULL) {
          $hospedagens = $hospedagens->whereHas('endereco', function ($query2) {
                  $query2->where('cidade', 'ilike', \Request::get('termo'))
                        ->orWhere('cep', 'ilike', \Request::get('termo'))
                        ->orWhere('estado', 'ilike', \Request::get('termo'))
                        ->orWhere('bairro', 'ilike', \Request::get('termo'));
              });


           $hospedagens = $hospedagens->orWhereHas('hospedagem', function ($query3) {
                      $query3->where('nomePropriedade', 'ilike', \Request::get('termo'))
                              ->orWhere('nomePropriedade', 'ilike', \Request::get('termo'));
                  });


           $hospedagens = $hospedagens->orWhereHas('servico', function ($query4) {
                      $query4->where('nomeServico', 'ilike', \Request::get('termo'))
                              ->orWhere('nomeServico', 'ilike', \Request::get('termo'));
                  });

           $endereco_ids = \DB::table('servico_oferecido_hospedagems')->where('servico', 'ilike', 
            $request->termo)->pluck('hospedagem_id');
           $hospedagens = \App\Hospedagem::whereIn('id', $endereco_ids);
 }   
      $hospedagens = $hospedagens->get();
      

       // echo ($hospedagens->toSql());
        
      //  return "";

     
  /*        

        
        $servicosh = \App\Hospedagem::whereIn('id', $endereco_ids)->get();

        -------------------------------------------------------------------------*/

        
        return view("ExibirBusca", [ 'servicosh' => array(), //$servicosh,
                                      'hospedagens' => $hospedagens,
                                      'servicos' => array(), //$servicos,
                                      ]);
    }
}
