<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DatePeriod;
use DateIntercal;
use Validator;

class TransacaoController extends Controller
{
  public function adicionarTransacao(Request $request){
    $messages = [
        'dataEntrada.required' => 'Selecione uma data de entrada',
        'dataSaida.required' => 'Selecione uma data de saída',
        'quantPessoas.numeric' => 'Este valor deve ser um número',
        'quantPessoas.required' => 'Informe a quantidade de pessoas',
        'dataEntrada.after' => 'Data de entrada inválida',
        'dataSaida.after' => 'A data de saída deve ser após a data de entrada',
    ];

    $validator = Validator::make($request->all(), [
      'dataEntrada'=>'required|after:today',
      'dataSaida'=>'required|after:dataEntrada',
      'quantPessoas'=>'required|numeric',
    ], $messages);

    if ($validator->fails()) {
        return redirect('/contratarAnuncio')
                    ->withErrors($validator)
                    ->withInput();
    }

    $transacao = new \App\Transacao();
    $transacao->dataEntrada = $request->dataEntrada;
    $transacao->dataSaida = $request->dataSaida;
    $transacao->quantPessoas = $request->quantPessoas;
    //pegar aid pelo anuncio na tela atual
    $transacao->anuncio_id = $request->anuncio_id;
    //$transacao->cliente_id = $request->host_id;
    $transacao->cliente_id = $request->cliente_id;
    $transacao->precoTotal = $this->calcularPreco($request->anuncio_id, $request->dataEntrada, $request->dataSaida);

    $transacao->save();

    return view ('ListaHospedagens');
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
}
