<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;
use App\Repositories\HospedagemRepository;
use App\Validator\EnderecoValidator;
use Validator;

class HospedagemController extends Controller
{
  public function adicionarHospedagem(Request $request, HospedagemRepository $repo){

    try {

      EnderecoValidator::validate($request->all());

    }catch(\App\Validator\ValidationException $e) {
      return back()->withErrors($e->getValidator())
                  ->withInput();
    }

    $anuncio = [
      'descricao' => $request->lodging_description,
      'anunciante_id' => $request->host_id,
      'preco' => $request->lodging_price,
    ];

    $hospedagem = [
      'nomePropriedade' => $request->lodging_title
    ];

    $endereco = [
      'cidade' => $request->lodging_municipality,
      'estado' => $request->lodging_state,
      'rua' => $request->lodging_street,
      'numero' => $request->lodging_street_number,
      'bairro' => $request->lodging_neighbourhood,
      'cep' => $request->lodging_postal_code,
      'complemento' => $request->lodging_address_complement,
    ];

    $hospedagemID = $repo->saveHospedagem($anuncio, $hospedagem, $endereco);

    return redirect ("/InserirImagensHospedagem/{$hospedagemID}");
  }

  public function listarHospedagens(){
    $hospedagens = \App\Hospedagem::all();
    return view ('ListaHospedagens', ['hospedagens' => $hospedagens]);
  }

  public function exibirHospedagem($id) {
    $hospedagem = \App\Hospedagem::find($id);
    $endereco = \App\Endereco::find($id);
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
    return view("EditarHospedagem", ['hospedagem' => $hospedagem,
                                     'anuncio' => $anuncio]);
  }

  public function salvar(Request $request) {

    $hospedagem = \App\Hospedagem::find($request->id);
    $hospedagem->nomePropriedade = $request->nomePropriedade;
    $hospedagem->save();

    $anuncio = \App\Anuncio::find($hospedagem->anuncio_id);
    $anuncio->descricao = $request->descricao;
    $anuncio->anunciante_id = $request->anunciante_id;
    $anuncio->preco = $request->preco;
    $anuncio->save();
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
