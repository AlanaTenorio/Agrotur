<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;

class ServicoController extends Controller
{
  public function adicionarServico(Request $request){

    $anuncio = new \App\Anuncio();
    $anuncio->descricao = $request->service_description;
    $anuncio->anunciante_id = $request->provider_id;
    $anuncio->preco = $request->service_price;
    $anuncio->save();

    $servico = new \App\Servico();
    $servico->nomeServico = $request->service_title;
    $servico->anuncio_id = $anuncio->id;
    $servico->save();

    $endereco = new \App\Endereco();
    $endereco->anuncio_id = $anuncio->id;
    $endereco->cidade = $request->service_municipality;
    $endereco->estado = $request->service_state;
    $endereco->rua = $request->service_street;
    $endereco->numero = $request->service_street_number;
    $endereco->bairro = $request->service_neighbourhood;
    $endereco->cep = $request->service_postal_code;
    $endereco->complemento = $request->service_address_complement;
    $endereco->save();

    return redirect ("/InserirImagensServico/{$servico->id}");
  }

  public function editar($id) {
    $servico = \App\Servico::find($id);
    $anuncio = \App\Anuncio::find($servico->anuncio_id);
    return view("EditarServico", ['servico' => $servico,
                                     'anuncio' => $anuncio]);
  }

  public function salvar(Request $request){
    $servico = \App\Servico::find($request->id);
    $servico->nomeServico = $request->nomeServico;
    $servico->save();

    $anuncio = \App\Anuncio::find($servico->anuncio_id);
    $anuncio->descricao = $request->descricao;
    $anuncio->anunciante_id = $request->anunciante_id;
    $anuncio->preco = $request->preco;
    $anuncio->save();
    return redirect ('/listaServicos');
  }

  public function listarServicos(){
    $servicos = \App\Servico::all();
    return view ('ListaServicos', ['servicos' => $servicos]);
  }

  public function exibirServico($id) {
    $servicos = \App\Servico::find($id);
    $anuncio = \App\Anuncio::find($servicos->anuncio_id);
    $imagens = \App\Imagem_Servico::where('servico_id', '=', $id)->get();
    return view("ExibirServico", ['servicos' => $servicos,
                                      'imagens' => $imagens,
                                      'anuncio' => $anuncio]);
  }

  public function remover($id) {
    $servico = \App\Servico::find($id);

    // Apaga todas as imagens da servico escolhida
    $imagens = \App\Imagem_Servico::where('servico_id', '=', $id)->get();
    foreach ($imagens as $i) {
      $path = $i->imagem;
      unlink(".".$path); // deleta o arquivo de imagem
      $i->delete();
    }

    $servico->delete();
    return redirect("/listaServicos");
  }

  public function inserirImagensServico($id){
    $servico= \App\Servico::find($id);
    return view("InserirImagensServico", ['servico' => $servico]);
  }

  public function salvarImagemServico(Request $request, ImageRepository $repo){
    $servico = \App\Servico::find($request->servico_id);
    $imagem = new \App\Imagem_Servico();

    // Testa se tem um arquivo sendo enviado
    if ($request->hasFile('primaryImage')) {
      $imagem->imagem = $repo->saveImage($request->primaryImage, $request->servico_id, 'servicos', 250);
      $imagem->servico_id = $servico->id;
      $imagem->save();
    }

    return redirect($_SERVER['HTTP_REFERER']);
  }

  public function editarImagens($id){
    $servico = \App\Servico::find($id);
    $imagens = \App\Imagem_Servico::where('servico_id', '=', $servico->id)->get();
    return view("EditarImagensServico", ['servico' => $servico,
                                         'imagens' => $imagens]);
  }

  public function removerImagens($id){
    $imagem = \App\Imagem_Servico::find($id);

    $path = $imagem->imagem;
    unlink(".".$path); // deleta o arquivo de imagem

    $imagem->delete();
    return redirect($_SERVER['HTTP_REFERER']);
  }

}
