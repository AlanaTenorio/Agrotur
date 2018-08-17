<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;
use App\Validator\ServicoValidator;
use Validator;

class ServicoController extends Controller
{
  public function adicionarServico(Request $request){

    try {

      ServicoValidator::validate($request->all());

    }catch(\App\Validator\ValidationException $e) {
      return back()->withErrors($e->getValidator())
                  ->withInput();
    }

    $anuncio = new \App\Anuncio();
    $anuncio->descricao = $request->service_description;
    $anuncio->anunciante_id = $request->provider_id;
    $anuncio->preco = $request->service_price;
    $video = $request->service_video;
    $video = str_ireplace("watch?v=", "embed/", $video);
    $video = str_ireplace("youtu.be/", "www.youtube.com/watch?v=", $video);
    $anuncio->video = $video;
    $anuncio->save();

    $servico = new \App\Servico();
    $servico->nomeServico = $request->service_title;
    $servico->categoria = $request->service_category;
    $servico->anuncio_id = $anuncio->id;
    $servico->save();

    $endereco = new \App\Endereco();
    $endereco->anuncio_id = $anuncio->id;
    $endereco->cidade = $request->service_municipality;
    $endereco->estado = $request->service_state;
    $endereco->rua = $request->service_street;
    $endereco->numero = $request->service_street_number;
    $endereco->bairro = $request->service_neighborhood;
    $endereco->cep = $request->service_postal_code;
    $endereco->complemento = $request->service_address_complement;
    $endereco->save();

    for ($i = 1; $i <= 8; $i++) {
      $imagem = new \App\Imagem_Servico();
      $imageIndex = "image0".$i;
      if ($request->hasFile($imageIndex)) {
        $repo = new ImageRepository;
        $imagem->imagem = $repo->saveImage($request->$imageIndex, $servico->id, 'servicos', 2048);
        $imagem->servico_id = $servico->id;
        $imagem->save();
      }
    }

    return redirect ('ExibirServico/'.$servico->id);
  }

  public function editar($id) {
    $servico = \App\Servico::find($id);
    $anuncio = \App\Anuncio::find($servico->anuncio_id);

    $endereco = \App\Endereco::where('anuncio_id', '=', $servico->anuncio_id)->get()->first();
    $imagens = \App\Imagem_Servico::where('servico_id', '=', $servico->id)->get();
    return view("EditarServico",
                ['servico' => $servico,
                  'anuncio' => $anuncio,
                  'endereco' => $endereco,
                  'imagens' => $imagens,
                ]
                );
  }

  public function salvar(Request $request){
    $servico = \App\Servico::find($request->id);
    $servico->nomeServico = $request->service_title;
    $servico->categoria = $request->service_category;
    $servico->save();

    $anuncio = \App\Anuncio::find($servico->anuncio_id);
    $anuncio->descricao = $request->service_description;
    $anuncio->preco = $request->service_price;
    $video = $request->service_video;
    $video = str_ireplace("watch?v=", "embed/", $video);
    $video = str_ireplace("youtu.be/", "www.youtube.com/watch?v=", $video);
    $anuncio->video = $video;
    $anuncio->save();


    $endereco = \App\Endereco::where('anuncio_id', '=', $servico->anuncio_id)->get()->first();
    $endereco->cidade = $request->service_municipality;
    $endereco->estado = $request->service_state;
    $endereco->rua = $request->service_street;
    $endereco->numero = $request->service_street_number;
    $endereco->bairro = $request->service_neighborhood;
    $endereco->cep = $request->service_postal_code;
    $endereco->complemento = $request->service_address_complement;
    $endereco->save();

    /*TODO
      Falta poder apagar uma imagem, passar "delete" como value para a imagem inserida quando
      ela dever ser deletada.
    */
    $images_old = \App\Imagem_Servico::where('servico_id', '=', $servico->id)->get();
    for ($i = 1; $i <= 8; $i++) {
      $imagem = new \App\Imagem_Servico();
      $imageIndex = "image0".$i;
      if ($request->hasFile($imageIndex)) {
        if ($i - 1 < sizeof($images_old)) {
          unlink(".".$images_old[$i-1]->imagem);
          $images_old[$i-1]->delete();
        }
        $repo = new ImageRepository;
        $imagem->imagem = $repo->saveImage($request->$imageIndex, $servico->id, 'servicos', 2048);
        $imagem->servico_id = $servico->id;
        $imagem->save();
      }
    }

    return redirect ('/ExibirServico/'.$servico->id);
  }

  public function listarServicos(){
    $servicos = \App\Servico::all();
    return view ('ListaServicos', ['servicos' => $servicos]);

  }

  public function exibirServico($id) {
    $servicos = \App\Servico::find($id);
    $endereco = \App\Endereco::where('anuncio_id', '=', $servicos->anuncio_id)->get()->first();
    $anuncio = \App\Anuncio::find($servicos->anuncio_id);
    $anunciante = \App\Cliente::find($anuncio->anunciante_id);
    $imagens = \App\Imagem_Servico::where('servico_id', '=', $id)->get();
    $id_anuncio = $servicos->anuncio_id;
    $avaliacoes = \App\Avaliacao_Anuncio::where('anuncio_id', '=', $id_anuncio)->get();
    return view("ExibirServico", ['servicos' => $servicos,
                                      'imagens' => $imagens,
                                      'anuncio' => $anuncio,
                                      'endereco' => $endereco,
                                      'anunciante' => $anunciante,
                                      'avaliacoes' => $avaliacoes]);
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
