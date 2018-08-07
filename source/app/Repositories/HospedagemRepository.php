<?php

namespace App\Repositories;

use App\Hospedagem;
use App\Anuncio;
use App\Endereco;
use App\servicoOferecido_hospedagem;

class HospedagemRepository{
    public function saveHospedagem($a, $h, $e, $s){
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

      $serviceList = explode(";", $s);
      foreach ($serviceList as $service) {
        $servico = new servicoOferecido_hospedagem();
        $servico->hospedagem_id = $hospedagem->id;
        $servico->servico = $service;
        $servico->save();
      }

      return $hospedagem->id;

    }
}
