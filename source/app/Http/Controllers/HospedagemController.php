<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;
use App\Repositories\HospedagemRepository;
use App\Validator\HospedagemValidator;
use App\Imagem_Hospedagem;
use Validator;

//TODO refatorar isso

class HospedagemController extends Controller
{
  public function adicionarHospedagem(Request $request, HospedagemRepository $repo){

    $endereco = [
      'cidade' => $request->lodging_municipality,
      'estado' => $request->lodging_state,
      'rua' => $request->lodging_street,
      'numero' => $request->lodging_street_number,
      'bairro' => $request->lodging_neighbourhood,
      'cep' => $request->lodging_postal_code,
      'complemento' => $request->lodging_address_complement,
    ];

    $video = $request->lodging_video;
    $video = str_ireplace("watch?v=", "embed/", $video);
    $video = str_ireplace("youtu.be/", "www.youtube.com/watch?v=", $video);

    $anuncio = [
      'descricao' => $request->lodging_description,
      'anunciante_id' => $request->host_id,
      'preco' => $request->lodging_price,
      'video' => $video,
    ];

    $hospedagem = [
      'nomePropriedade' => $request->lodging_title
    ];

    $services = $request->lodging_services;

    try {

      $dados = array_merge($endereco, $anuncio, $hospedagem);
      HospedagemValidator::validate($dados);

    }catch(\App\Validator\ValidationException $e) {
      return back()->withErrors($e->getValidator())
                  ->withInput();
    }

    $hospedagemID = $repo->saveHospedagem($anuncio, $hospedagem, $endereco, $services);

    for ($i = 1; $i <= 8; $i++) {
      $imagem = new Imagem_Hospedagem();
      $imageIndex = "image0".$i;
      if ($request->hasFile($imageIndex)) {
        $repo = new ImageRepository;
        $imagem->imagem = $repo->saveImage($request->$imageIndex, $hospedagemID, 'hospedagens', 2048);
        $imagem->hospedagem_id = $hospedagemID;
        $imagem->save();
      }
    }
    return redirect ('ExibirHospedagem/'.$hospedagemID);
  }

  public function listarHospedagens(){
    $hospedagens = \App\Hospedagem::all();
    return view ('ListaHospedagens', ['hospedagens' => $hospedagens]);
  }

  public function exibirHospedagem($id) {
    $hospedagem = \App\Hospedagem::find($id);
    $endereco = \App\Endereco::where('anuncio_id', '=', $hospedagem->anuncio_id)->get()->first();
    $anuncio = \App\Anuncio::find($hospedagem->anuncio_id);
    $anunciante = \App\Cliente::find($anuncio->anunciante_id);
    $imagens = \App\Imagem_Hospedagem::where('hospedagem_id', '=', $id)->get();
    $servicos = \App\servicoOferecido_hospedagem::where('hospedagem_id', '=', $id)->get();
    $id_anuncio = $hospedagem->anuncio_id;
    $avaliacoes = \App\Avaliacao_Anuncio::where('anuncio_id', '=', $id_anuncio)->get();
    return view("ExibirHospedagem", ['hospedagem' => $hospedagem,
                                      'imagens' => $imagens,
                                      'anuncio' => $anuncio,
                                      'servicos' => $servicos,
                                      'endereco' => $endereco,
                                      'anunciante' => $anunciante,
                                      'avaliacoes' => $avaliacoes]);
  }

  public function editar($id) {
    $hospedagem = \App\Hospedagem::find($id);
    $anuncio = \App\Anuncio::find($hospedagem->anuncio_id);
    $servicos = \App\servicoOferecido_hospedagem::where('hospedagem_id', '=', $id)->get();
    $servicosStr = "";
    foreach ($servicos as $servico) {
      $servicosStr = $servicosStr.$servico->servico.';';
    }
    $servicosStr = trim($servicosStr, ";");
    $endereco = \App\Endereco::where('anuncio_id', '=', $hospedagem->anuncio_id)->get()->first();
    $imagens = \App\Imagem_Hospedagem::where('hospedagem_id', '=', $hospedagem->id)->get();
    return view("EditarHospedagem",
                ['hospedagem' => $hospedagem,
                  'anuncio' => $anuncio,
                  'endereco' => $endereco,
                  'servicos' => $servicosStr,
                  'imagens' => $imagens,
                ]
                );
  }

  public function salvar(Request $request) {
    $hospedagem = \App\Hospedagem::find($request->id);
    $hospedagem->nomePropriedade = $request->lodging_title;
    $hospedagem->save();

    $anuncio = \App\Anuncio::find($hospedagem->anuncio_id);
    $anuncio->descricao = $request->lodging_description;
    $anuncio->preco = $request->lodging_price;
    $video = $request->lodging_video;
    $video = str_ireplace("watch?v=", "embed/", $video);
    $video = str_ireplace("youtu.be/", "www.youtube.com/watch?v=", $video);
    $anuncio->video = $video;
    $anuncio->save();


    $endereco =  \App\Endereco::where('anuncio_id', '=', $hospedagem->anuncio_id)->get()->first();
    $endereco->cidade = $request->lodging_municipality;
    $endereco->estado = $request->lodging_state;
    $endereco->rua = $request->lodging_street;
    $endereco->numero = $request->lodging_street_number;
    $endereco->bairro = $request->lodging_neighbourhood;
    $endereco->cep = $request->lodging_postal_code;
    $endereco->complemento = $request->lodging_address_complement;
    $endereco->save();

    $services_old = \App\servicoOferecido_hospedagem::where('hospedagem_id', '=', $hospedagem->id)->get();
    foreach ($services_old as $service) {
      $service->delete();
    }

    $services = $request->lodging_services;
    $serviceList = explode(";", $services);
    foreach ($serviceList as $service) {
      $servico = new \App\servicoOferecido_hospedagem();
      $servico->hospedagem_id = $hospedagem->id;
      $servico->servico = $service;
      $servico->save();
    }
    /*TODO
      Falta poder apagar uma imagem, passar "delete" como value para a imagem inserida quando
      ela dever ser deletada.
    */
    $images_old = \App\Imagem_Hospedagem::where('hospedagem_id', '=', $hospedagem->id)->get();
    for ($i = 1; $i <= 8; $i++) {
      $imagem = new \App\Imagem_Hospedagem();
      $imageIndex = "image0".$i;
      if ($request->hasFile($imageIndex)) {
        if ($i - 1 < sizeof($images_old)) {
          unlink(".".$images_old[$i-1]->imagem);
          $images_old[$i-1]->delete();
        }
        $repo = new ImageRepository;
        $imagem->imagem = $repo->saveImage($request->$imageIndex, $hospedagem->id, 'hospedagens', 2048);
        $imagem->hospedagem_id = $hospedagem->id;
        $imagem->save();
      }
    }

    return redirect ('/listaHospedagens');

  }

  public function remover($id) {
    $hospedagem = \App\Hospedagem::find($id);

    // Apaga todas as imagens da hospedagem escolhida
    $imagens = \App\Imagem_Hospedagem::where('hospedagem_id', '=', $id)->get();
    foreach ($imagens as $i) {
      $path = $i->imagem;
      unlink(".".$path); // deleta o arquivo de imagem
      $i->delete();
    }

    // Apaga todas os serviços da hospedagem escolhida
    $servicos = \App\servicoOferecido_hospedagem::where('hospedagem_id', '=', $id)->get();
    foreach ($servicos as $s) {
      $s->delete();
    }

    $hospedagem->delete();
    return redirect("/listaHospedagens");
  }

  public function inserirImagens($id){
    $hospedagem = \App\Hospedagem::find($id);
    return view("InserirImagensHospedagens", ['hospedagem' => $hospedagem]);
  }

  public function salvarImagem(Request $request, ImageRepository $repo){
    $hospedagem = \App\Hospedagem::find($request->hospedagem_id);
    $imagem = new \App\Imagem_Hospedagem();

    // Testa se tem um arquivo sendo enviado
    if ($request->hasFile('primaryImage')) {
      $imagem->imagem = $repo->saveImage($request->primaryImage, $request->hospedagem_id, 'hospedagens', 250);
      $imagem->hospedagem_id = $hospedagem->id;
      $imagem->save();
    }

    return redirect($_SERVER['HTTP_REFERER']);
  }

  public function editarImagens($id){
    $hospedagem = \App\Hospedagem::find($id);
    $imagens = \App\Imagem_Hospedagem::where('hospedagem_id', '=', $hospedagem->id)->get();
    return view("EditarImagensHospedagem", ['hospedagem' => $hospedagem,
                                      'imagens' => $imagens]);
  }

  public function removerImagens($id){
    $imagem = \App\Imagem_Hospedagem::find($id);

    $path = $imagem->imagem;
    unlink(".".$path); // deleta o arquivo de imagem

    $imagem->delete();
    return redirect($_SERVER['HTTP_REFERER']);
  }

  public function inserirServicosOferecidos($id){
    $hospedagem = \App\Hospedagem::find($id);
    return view("InserirServicosHospedagem", ['hospedagem' => $hospedagem]);
  }

  public function salvarServicosOferecidos(Request $request){
    $hospedagem = \App\Hospedagem::find($request->hospedagem_id);
    $servico = new \App\servicoOferecido_hospedagem();
    $servico->hospedagem_id = $hospedagem->id;
    $servico->servico = $request->servico;
    $servico->save();

    return redirect($_SERVER['HTTP_REFERER']);
  }

  public function editarServicosOferecidos($id){
    $hospedagem = \App\Hospedagem::find($id);
    $servicos = \App\servicoOferecido_hospedagem::where('hospedagem_id', '=', $hospedagem->id)->get();
    return view("EditarServicosHospedagem", ['hospedagem' => $hospedagem,
                                      'servicos' => $servicos]);
  }

  public function removerServicosOferecidos($id){
    $servico = \App\servicoOferecido_hospedagem::find($id);
    $servico->delete();
    return redirect($_SERVER['HTTP_REFERER']);
  }
}
