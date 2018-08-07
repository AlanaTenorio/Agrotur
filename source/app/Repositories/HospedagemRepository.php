<?php

namespace App\Repositories;

use App\Hospedagem;
use App\Anuncio;
use App\Endereco;

class HospedagemRepository{
    public function saveHospedagem($a, $h, $e){
      $anuncio = new Anuncio;
      $anuncio->fill($a);
      $anuncio->save();

      $e['anuncio_id'] = $anuncio->id;
      $h['anuncio_id'] = $anuncio->id;

      $hospedagem = new Hospedagem();
      $hospedagem->nomePropriedade = $h['nomePropriedade'];
      $hospedagem->anuncio_id = $h['anuncio_id'];
      $hospedagem->save();

      $endereco = new Endereco();
      $endereco->fill($e);
      $endereco->save();

      return $hospedagem->id;

    }
}
