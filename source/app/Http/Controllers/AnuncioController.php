<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Transacao;

class AnuncioController extends Controller
{
    public static function getDadosAnuncio($id) {
        $type = 'Hospedagem';
        $isService = false;
        $ad = DB::table('anuncios')->where('id', $id)->first();
        $lodging = DB::table('hospedagems')->where('anuncio_id', $id)->first();
        if (empty($lodging)) {
            $lodging = DB::table('servicos')->where('anuncio_id', $id)->first();
            $image = DB::table('imagem__servicos')->where('servico_id', $lodging->id)->first();
            $isService = true;
            $type = 'Servico';
        }
        else {
            $image = DB::table('imagem__hospedagems')->where('hospedagem_id', $lodging->id)->first();
        }

        $title = '';
        $categoria = '';

        if ($isService) {
            $title = $lodging->nomeServico;
            $categoria = $lodging->categoria;
        }
        else {
            $title = $lodging->nomePropriedade;
        }

        if (empty($image)) {
            //TODO substituir por uma imagem interna
            $image_link = "https://blog.stylingandroid.com/wp-content/themes/lontano-pro/images/no-image-slide.png";
        }
        else {
            $image_link = $image->imagem;
        }

        return [
            'id' => $lodging->id,
            'type' => $type,
            'title' => $title,
            'description' => $ad->descricao,
            'price' => $ad->preco,
            'image' => $image_link,
            'seller_id' => $ad->anunciante_id,
            'categoria' => $categoria,
        ];
    }

    public static function getAnunciosProximos(){
      $location = \GeoIP::getLocation(request()->ip());

      // Usando código de Busca controller aqui
      $anuncios = \App\Anuncio::where("preco", ">", 0);
      $anuncios = $anuncios->whereHas('endereco', function ($query2) use ($location) {
                  $query2->where('cidade', 'ilike', $location['city'])
                        ->orWhere('estado', 'ilike', $location['state']);
              });
      $anuncios = $anuncios->get();

      return [
        'cidade' => $location['city'],
        'estado' => $location['state'],
        'anuncios' => $anuncios,
      ];

    }

    public static function getVendasAnuncio($id) {
        return \App\Transacao::where('anuncio_id', $id)->get();
    }

    public static function getReceitaAnuncio($id) {
        $output = 0;
        foreach (\App\Http\Controllers\AnuncioController::getVendasAnuncio($id) as $sale) {
            $output += $sale->precoTotal;
        }
        return $output;
    }

    public function visualizarVendasAnuncio($id) {
        $adData = \App\Http\Controllers\AnuncioController::getDadosAnuncio($id);
        $transactions = \App\Transacao::where('anuncio_id', $id)->get();

        return view("VendasAnuncio", [
                                'id' => $adData['id'],
                                'title' => $adData['title'],
                                'price' => $adData['price'],
                                'icon' => $adData['image'],
                                'description' => $adData['description'],
                                'type' => $adData['type'],
                                'transactions' => $transactions,
                                'seller_id' => $adData['seller_id'],
                                ]
                    );
    }
}
