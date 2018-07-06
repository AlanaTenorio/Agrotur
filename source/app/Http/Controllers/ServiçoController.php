<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;

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

  public function editar($id) {
    $servico = \App\Serviço::find($id);
    $anuncio = \App\Anuncio::find($servico->anuncio_id);
    return view("EditarServico", ['servico' => $servico,
                                     'anuncio' => $anuncio]);
  }

  public function salvar(Request $request){
    $serviço = \App\Serviço::find($request->id);
    $serviço->nomeServiço = $request->nomeServiço;
    $serviço->preço = $request->preço;
    $serviço->save();

    $anuncio = \App\Anuncio::find($serviço->anuncio_id);
    $anuncio->descriçao = $request->descriçao;
    $anuncio->anunciante_id = $request->anunciante_id;
    $anuncio->save();
    return redirect ('/listaServicos');
  }

  public function listarServicos(){
    $servicos = \App\Serviço::all();
    return view ('ListaServicos', ['servicos' => $servicos]);
  }

  public function exibirServico($id) {
    $servicos = \App\Serviço::find($id);
    $anuncio = \App\Anuncio::find($servicos->anuncio_id);
    $imagens = \App\Imagem_Serviço::where('serviço_id', '=', $id)->get();
    return view("ExibirServico", ['servicos' => $servicos,
                                      'imagens' => $imagens,
                                      'anuncio' => $anuncio]);
  }

  public function remover($id) {
    $servico = \App\Serviço::find($id);
    
    // Apaga todas as imagens da servico escolhida
    $imagens = \App\Imagem_Serviço::where('serviço_id', '=', $id)->get();
    foreach ($imagens as $i) {
      $path = $i->imagem;
      unlink(".".$path); // deleta o arquivo de imagem
      $i->delete();
    }

    $servico->delete();
    return redirect("/listaServicos");
  }

  public function inserirImagensServico($id){
    $serviço= \App\Serviço::find($id);
    return view("InserirImagensServico", ['serviço' => $serviço]);
  }

  public function salvarImagemServico(Request $request, ImageRepository $repo){
    $servico = \App\Serviço::find($request->serviço_id);
    $imagem = new \App\Imagem_Serviço();

    // Testa se tem um arquivo sendo enviado
    if ($request->hasFile('primaryImage')) {
      $imagem->imagem = $repo->saveImage($request->primaryImage, $request->serviço_id, 'servicos', 250);
      $imagem->serviço_id = $servico->id;
      $imagem->save();
    }
    
    return redirect($_SERVER['HTTP_REFERER']);
  }

  public function editarImagens($id){
    $servico = \App\Serviço::find($id);
    $imagens = \App\Imagem_Serviço::where('serviço_id', '=', $servico->id)->get();
    return view("EditarImagensServico", ['servico' => $servico,
                                         'imagens' => $imagens]);
  }

  public function removerImagens($id){
    $imagem = \App\Imagem_Serviço::find($id);

    $path = $imagem->imagem;
    unlink(".".$path); // deleta o arquivo de imagem

    $imagem->delete();
    return redirect($_SERVER['HTTP_REFERER']);
  }

}
