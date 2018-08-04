<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//rotas para serem acessadas apenas por administradores

Route::get('/listaClientes', "ClienteController@listarClientes")->name('listar_clientes');

Route::get('/RemoverCliente/{id}', "ClienteController@remover");

Route::post('/ApagarCliente', "ClienteController@apagar");

Route::post('/SalvarCliente', "ClienteController@salvar");

Route::post('/SalvarSenhaCliente', "ClienteController@salvarSenha");

Route::get('/listaHospedagens', "HospedagemController@listarHospedagens");

Route::get('/listaServicos', "ServicoController@listarServicos");

//rotas públicas

Route::get('/', 'HomeController@home')->name('home');

Route::get('/cadastroCliente', function(Request $request) {
    return view('CadastroCliente');
})->name('cadastro_clientes');

Route::post('/cadastroCliente', "ClienteController@adicionarCliente");

Route::get('/ExibirHospedagem/{id}', "HospedagemController@exibirHospedagem");

Route::get('/ExibirServico/{id}', "ServicoController@exibirServico");

Auth::routes();

Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('google.login');

Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/busca', "BuscaController@getView")->name('busca');

//rotas que precisam de autorizacao para serem acessadas

Route::middleware('auth')->group(function() {
  Route::get('/cadastroHospedagem', function(Request $request) {
      return view('CadastroHospedagem');
  })->name('cadastro_hospedagem');

  Route::get('/EditarHospedagem/{id}', "HospedagemController@editar");

  Route::get('/inserirImagens', function(Request $request) {
      return view('InserirImagens');
  });

  Route::get('/RemoverHospedagem/{id}', "HospedagemController@remover");

  Route::post('/SalvarHospedagem', "HospedagemController@salvar");

  Route::post('/cadastroHospedagem', "HospedagemController@adicionarHospedagem");

  Route::get('/InserirImagensHospedagem/{id}', "HospedagemController@inserirImagens");

  Route::post('/SalvarImagemHospedagem', "HospedagemController@salvarImagem");

  Route::get('/EditarImagensHospedagem/{id}', "HospedagemController@editarImagens");

  Route::get('/RemoverImagemHospedagem/{id}', "HospedagemController@removerImagens");

  Route::get('/InserirServicosHospedagem/{id}', "HospedagemController@inserirServicosOferecidos");

  Route::get('/inserirServicosHospedagem', function(Request $request) {
      return view('InserirServicosHospedagem');
  });

  Route::post('/salvarServicosOferecidos', "HospedagemController@salvarServicosOferecidos");

  Route::get('/EditarServicosHospedagem/{id}', "HospedagemController@editarServicosOferecidos");

  Route::get('/RemoverServicosHospedagem/{id}', "HospedagemController@removerServicosOferecidos");
});

Route::middleware('auth')->group(function() {
  Route::get('/cadastroServico', function(Request $request) {
      return view('CadastroServico');
  })->name('cadastro_servico');

  Route::post('/cadastroServico', "ServicoController@adicionarServico");

  Route::post('/SalvarImagemServico', "ServicoController@salvarImagemServico");

  Route::get('/EditarImagensServico/{id}', "ServicoController@editarImagens");

  Route::get('/RemoverImagemServico/{id}', "ServiçoController@removerImagens");

  Route::post('/SalvarServico', "ServicoController@salvar");

  Route::get('/RemoverServico/{id}', "ServicoController@remover");

  Route::get('/inserirImagensServico', function(Request $request) {
      return view('InserirImagensServico');
  });

  Route::get('/InserirImagensServico/{id}', "ServicoController@inserirImagensServico");

  Route::post('/salvarImagemServico', "ServicoController@salvarImagemServico");

  Route::get('/EditarServico/{id}', "ServicoController@editar");

  Route::get('/RemoverImagemServico/{id}', "ServicoController@removerImagens");
});

Route::middleware('auth')->group(function() {
  Route::get('/EditarCliente/{id}', "ClienteController@editar");

  Route::get('/EditarSenha/{id}', "ClienteController@editarSenha");

  Route::post('/avaliarAnuncio', "AvaliacaoController@avaliarAnuncio");

  Route::get('/contratarAnuncio/{id}', function($id) {
      return view('ContratarAnuncio', ['id' => $id]);
  });

  Route::get('/exibirFavoritos', "ClienteController@visualizarFavoritos")->name('listarFavoritos');

  Route::post('/salvarTransacao', 'TransacaoController@adicionarTransacao');

  Route::get('paypal', "PagamentoController@pagarComPayPal")->name('paypal');

  Route::get('status', "PagamentoController@statusPagamento")->name('status');

  Route::post('/ExibirHospedagem/{id}', 'ClienteController@favoritarOuDesfavoritar')->name('favoritos');

  Route::post('/ExibirServico/{id}', 'ClienteController@favoritarOuDesfavoritar')->name('favoritos');
});


// Route::get('/avaliarAnuncio', function(Request $request) {
//     return view('AvaliarAnuncio');
// })->name('avaliar_anuncio');
//Route::post('avaliar', "AvaliacaoController@avaliarAnuncio")->name('avaliar_anuncio');
