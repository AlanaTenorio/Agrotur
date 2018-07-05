<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;
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

    return redirect ("/InserirImagensHospedagem/{$hospedagem->id}");
  }

  public function listarHospedagens(){
    $hospedagens = \App\Hospedagem::all();
    return view ('ListaHospedagens', ['hospedagens' => $hospedagens]);
  }

  public function exibirHospedagem($id) {
    $hospedagem = \App\Hospedagem::find($id);
    $anuncio = \App\Anuncio::find($hospedagem->anuncio_id);
    $imagens = \App\Imagem_Hospedagem::where('hospedagem_id', '=', $id)->get();
    $servicos = \App\serviçoOferecido_hospedagem::where('hospedagem_id', '=', $id)->get();
    return view("ExibirHospedagem", ['hospedagem' => $hospedagem,
                                      'imagens' => $imagens,
                                      'anuncio' => $anuncio,
                                      'servicos' => $servicos]);
  }

  public function editar($id) {
    $hospedagem = \App\Hospedagem::find($id);
    return view("EditarHospedagem", ['hospedagem' => $hospedagem]);
  }

  public function salvar(Request $request) {
    $hospedagem = \App\Hospedagem::find($request->id);
    $hospedagem->nomePropriedade = $request->nomePropriedade;
    $hospedagem->preçoDiaria = $request->preçoDiaria;
    $hospedagem->save();

    $anuncio = \App\Anuncio::find($hospedagem->anuncio_id);
    $anuncio->descriçao = $request->descriçao;
    $anuncio->anunciante_id = $request->anunciante_id;
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
    $servicos = \App\serviçoOferecido_hospedagem::where('hospedagem_id', '=', $id)->get();
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
    $servico = new \App\serviçoOferecido_hospedagem();
    $servico->hospedagem_id = $hospedagem->id;
    $servico->serviço = $request->servico;
    $servico->save();

    return redirect($_SERVER['HTTP_REFERER']);
  }

  public function editarServicosOferecidos($id){
    $hospedagem = \App\Hospedagem::find($id);
    $servicos = \App\serviçoOferecido_hospedagem::where('hospedagem_id', '=', $hospedagem->id)->get();
    return view("EditarServicosHospedagem", ['hospedagem' => $hospedagem,
                                      'servicos' => $servicos]);
  }

  public function removerServicosOferecidos($id){
    $servico = \App\serviçoOferecido_hospedagem::find($id);
    $servico->delete();
    return redirect($_SERVER['HTTP_REFERER']);
  }
}
