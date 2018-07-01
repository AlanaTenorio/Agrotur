<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class HospedagemController extends Controller
{
  public function adicionarHospedagem(Request $request){
    /*$validator = Validator::make($request->all(), [
      'descriçao'=>'required',
      'nomePropriedade'=>'required',
      'preçoDiaria'=>'required|digits',
    ]);

    if ($validator->fails()) {
        return redirect('/cadastroHospedagem')
                    ->withErrors($validator)
                    ->withInput();
    }*/

    $anuncio = new \App\Anuncio();
    $anuncio->descriçao = $request->descriçao;
    $anuncio->anunciante_id = $request->anunciante_id;
    $anuncio->save();

    $hospedagem = new \App\Hospedagem();
    $hospedagem->nomePropriedade = $request->nomePropriedade;
    $hospedagem->preçoDiaria = $request->preçoDiaria;
    $hospedagem->anuncio_id = $anuncio->id;
    $hospedagem->save();

    return redirect ("/InserirImagens/{$hospedagem->id}");
  }

  public function inserirImagens($id){
    $hospedagem = \App\Hospedagem::find($id);
    return view("InserirImagens", ['hospedagem' => $hospedagem]);
  }

  public function salvarImagem(Request $request){
    $hospedagem = \App\Hospedagem::find($request->hospedagem_id);
    $imagem = new \App\Imagem_Hospedagem();

    require_once("conexao.php");
    //$dbconn = pg_connect("host=localhost port=5432 dbname=agrotur user=alana password=123456") or die('Não foi possível conectar: ' . pg_last_error());

    $img = $_FILES["imagem"]["tmp_name"];
    $nomeFinal = time().'.jpg';
    $data = base64_decode($img);
    $file = move_uploaded_file($img, $nomeFinal);
    pg_query($dbconn, "begin");
    $oid = pg_lo_import($dbconn, $nomeFinal);
    $imagem->imagem = $oid;
    $imagem->hospedagem_id = $hospedagem->id;
    $imagem->save();

    unlink($nomeFinal);

    return redirect ("/InserirImagens/{$hospedagem->id}");
  }

  public function inserirServicosOferecidos($id){
    $hospedagem = \App\Hospedagem::find($id);
    return view("InserirServicosHospedagem", ['hospedagem' => $hospedagem]);
  }

  public function salvarServicosOferecidos(Request $request){
    $hospedagem = \App\Hospedagem::find($request->hospedagem_id);
    $servico = new \App\serviçoOferecido_hospedagem();
    $servico->hospedagem_id = $hospedagem->id;
    $servico->serviço = $request->servico;
    $servico->save();

    return redirect ("/InserirServicosHospedagem/{$hospedagem->id}");
  }
}
