<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;
use Validator;

class ServicoController extends Controller
{
  public function adicionarServico(Request $request){
    $messages = [
        'service_description.required' => 'Insira uma descrição do anúncio',
        'service_title.required' => 'Insira o título do anúncio',
        'service_price.numeric' => 'Este valor deve ser um número',
        'service_price.required' => 'Insira o preço deste anúncio',
        'service_municipality.required' => 'Insira a cidade no endereço do anúncio',
        'service_state.required' => 'Selecione um estado',
        'service_street.required' => 'Insira a rua no endereço do anúncio',
        'service_street_number.required' => 'Insira o número no endereço do anúncio',
        'service_street_neighbourhood.required' => 'Insira o bairro no endereço do anúncio',
        'service_postal_code.required' => 'Insira um CEP válido',
        'service_postal_code.digits' => 'Insira um CEP válido',
    ];

    $validator = Validator::make($request->all(), [
      'service_description'=>'required',
      'service_title'=>'required',
      'service_price'=>'required|numeric',
      'service_municipality'=>'required',
      'service_state'=>'required',
      'service_street'=>'required',
      'service_street_number'=>'required',
      'service_neighbourhood'=>'required',
      'service_postal_code'=>'required|digits:8',
    ], $messages);

    if ($validator->fails()) {
        return redirect('/cadastroServico')
                    ->withErrors($validator)
                    ->withInput();
    }

    $anuncio = new \App\Anuncio();
    $anuncio->descricao = $request->service_description;
    $anuncio->anunciante_id = $request->provider_id;
    $anuncio->preco = $request->service_price;
    $video = $request->lodging_video;
    $video = str_ireplace("watch?v=", "embed/", $video);
    $video = str_ireplace("youtu.be/", "www.youtube.com/watch?v=", $video);
    $anuncio->video = $video;
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
    return view("EditarServico", ['servico' => $servico,
                                     'anuncio' => $anuncio]);
  }

  public function salvar(Request $request){
    /*$messages = [
        'service_description.required' => 'Insira uma descrição do anúncio',
        'service_title.required' => 'Insira o título do anúncio',
        'service_price.numeric' => 'Este valor deve ser um número',
        'service_price.required' => 'Insira o preço deste anúncio',
        'service_municipality.required' => 'Insira a cidade no endereço do anúncio',
        'service_state.required' => 'Selecione um estado',
        'service_street.required' => 'Insira a rua no endereço do anúncio',
        'service_street_number.required' => 'Insira o número no endereço do anúncio',
        'service_street_neighbourhood.required' => 'Insira o bairro no endereço do anúncio',
        'service_postal_code.required' => 'Insira um CEP válido',
        'service_postal_code.digits' => 'Insira um CEP válido',
    ];
    $validator = Validator::make($request->all(), [
      'service_description'=>'required',
      'service_title'=>'required',
      'service_price'=>'required|numeric',
      'service_municipality'=>'required',
      'service_state'=>'required',
      'service_street'=>'required',
      'service_street_number'=>'required',
      'service_neighbourhood'=>'required',
      'service_postal_code'=>'required|digits:8',
    ], $messages);

    if ($validator->fails()) {
      return redirect()->action(
              'SeviçoController@editar', ['id' => $request->id]
             )->withErrors($validator)
              ->withInput();
    } */
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
    $endereco = \App\Endereco::find($id);
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
