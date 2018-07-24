<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscaController extends Controller
{
    public function getView(){
        return view("Busca");
    }

    public function buscar($termos) {/*
        $favoritos = \App\Favorito::where('cliente_id', '=', Auth::user()->id)->limit(3)->get();
        
        <a class='waves-effect dropdown-trigger grey-text text-darken-3' href='#' data-target='dropdown_Favorites'>FAVORITOS</a>
        <!-- Dropdown Favorites Structure -->
        <ul id='dropdown_Favorites' class='dropdown-content'>
            @foreach ($favoritos as $favorito)
            
            //o projeto do banco precisaria ser revisto para se evitar esse tipo de coisa
            //TODO mover para uma função no controller
            $type = 'Hospedagem';
            $isService = false;
            $ad = DB::table('anuncios')->where('id', $favorito->anuncio_id)->first();
            $lodging = DB::table('hospedagems')->where('anuncio_id', $favorito->anuncio_id)->first();
            if (empty($lodging)) {
                $lodging = DB::table('servicos')->where('anuncio_id', $favorito->anuncio_id)->first();
                $image = DB::table('imagem__servicos')->where('servico_id', $lodging->id)->first();
                $isService = true;
                $type = 'Servico';
            }
            else {
                $image = DB::table('imagem__hospedagems')->where('hospedagem_id', $lodging->id)->first();
            }
            
            <li>
                <a class='grey-text text-darken-2' href='/Exibir{{$type}}/{{$lodging->id}}'>
                    <div class="row">
                        <div class="left col s3">
                            
                            try {
                                echo "<img class='centered-and-cropped' style='border-radius:0%' src='$image->imagem' width=75 height=75>";
                            }
                            catch(Exception $e) {
                                //imagem externa temporária para anúncios sem imagem cadastrada, precisa ser substituída futuramente
                                echo "<img class='centered-and-cropped' style='border-radius:0%'  src='https://blog.stylingandroid.com/wp-content/themes/lontano-pro/images/no-image-slide.png'
                                    width=75 height=75>";
                            }
                            
                        </div>
                        <div class='col s9 right'>
                            <ul>
                                <li>
                                    <b>
                                        @if ($isService)
                                            {{substr($lodging->nomeServico, 0, 32)}}
                                            @if (strlen($lodging->nomeServico) > 32)
                                            ...
                                            @endif
                                        @else
                                        {{substr($lodging->nomePropriedade, 0, 32)}}
                                            @if (strlen($lodging->nomePropriedade) > 32)
                                            ...
                                            @endif
                                        @endif
                                    </b>
                                </li>
                                <li>
                                    {{substr($ad->descricao, 0, 57)}}
                                    @if (strlen($ad->descricao) > 57)
                                    ...
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
            <li><a href="{{ route('listarFavoritos') }}" class="black-text center">Ver Todos</a></li>
        </ul>*/
    }
}
