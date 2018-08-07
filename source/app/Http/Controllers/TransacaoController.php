<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DatePeriod;
use DateIntercal;
use Validator;
use App\Validator\TransacaoValidator;

class TransacaoController extends Controller
{
  public function adicionarTransacao(Request $request){
    try {

			TransacaoValidator::validate($request->all());

  	}catch(\App\Validator\ValidationException $e) {
      return redirect('/contratarAnuncio/'.$request->anuncio_id)
                  ->withErrors($e->getValidator())
                  ->withInput();
  	}

    $transacao = new \App\Transacao();
    $transacao->dataEntrada = $request->dataEntrada;
    $transacao->dataSaida = $request->dataSaida;
    $transacao->quantPessoas = $request->quantPessoas;
    $transacao->anuncio_id = $request->anuncio_id;
    $transacao->cliente_id = $request->host_id;
    $transacao->precoTotal = $this->calcularPreco($request->anuncio_id, $request->dataEntrada, $request->dataSaida);

    $transacao->save();

    return redirect()->route('paypal', ['valor' => $transacao->precoTotal, 'descricao' => $this->obtemDescricao($request->anuncio_id)]);
  }

  private static function calcularPreco($id, $dataEntrada, $dataSaida){
    $anuncio = \App\Anuncio::find($id);
    $precoDiaria = $anuncio->preco;
    $dataEntradaFormatada = new DateTime($dataEntrada);
    $dataSaidaFormatada = new DateTime($dataSaida);
    $diff = $dataEntradaFormatada->diff($dataSaidaFormatada);
    $quantDias = $diff->format("%a");
    $precoTotal = $precoDiaria * $quantDias;

    return $precoTotal;
  }

  private static function obtemDescricao($id){
    $anuncio = \App\Anuncio::find($id);
    return $anuncio->descricao;
  }
}
