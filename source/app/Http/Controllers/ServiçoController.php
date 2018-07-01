<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiçoController extends Controller
{
  public function adicionarServico(Request $request){

    $anuncio = new \App\Anuncio();
    $anuncio->descriçao = $request->descriçao;
    $anuncio->anunciante_id = $request->anunciante_id;
    $anuncio->save();

    $serviço = new \App\Serviço();
    $serviço->nomeServiço = $request->nomeServiço;
    $serviço->preço = $request->preço;
    $serviço->anuncio_id = $anuncio->id;
    $serviço->save();

    return redirect ("/InserirImagensServico/{$serviço->id}");
  }

  public function inserirImagensServico($id){
    $serviço= \App\Serviço::find($id);
    return view("InserirImagensServico", ['serviço' => $serviço]);
  }

  public function salvarImagemServico(Request $request){
    $serviço= \App\Serviço::find($request->serviço_id);
    $imagem = new \App\Imagem_Serviço();

    require_once("conexao.php");
    //$dbconn = pg_connect("host=localhost port=5432 dbname=agrotur user=alana password=123456") or die('Não foi possível conectar: ' . pg_last_error());

    $img = $_FILES["imagem"]["tmp_name"];
    $nomeFinal = time().'.jpg';
    $data = base64_decode($img);
    $file = move_uploaded_file($img, $nomeFinal);
    pg_query($dbconn, "begin");
    $oid = pg_lo_import($dbconn, $nomeFinal);
    $imagem->imagem = $oid;
    $imagem->serviço_id = $serviço->id;
    $imagem->save();

    unlink($nomeFinal);

    return redirect ("/InserirImagensServico/{$serviço->id}");
  }
}
