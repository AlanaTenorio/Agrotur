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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listaClientes', "ClienteController@listarClientes");

Route::get('/view', function () {
	return view('view');
});

Route::get('/cadastroCliente', function(Request $request) {
    return view('CadastroCliente');
});

Route::get('/inserirImagens', function(Request $request) {
    return view('InserirImagens');
});

Route::post('/cadastroCliente', "ClienteController@adicionarCliente");

Route::get('/RemoverCliente/{id}', "ClienteController@remover");

Route::get('/EditarCliente/{id}', "ClienteController@editar");

Route::post('/ApagarCliente', "ClienteController@apagar");

Route::post('/SalvarCliente', "ClienteController@salvar");

Route::get('/cadastroHospedagem', function(Request $request) {
    return view('CadastroHospedagem');
});

Route::get('/listaHospedagens', "HospedagemController@listarHospedagens");

Route::get('/ExibirHospedagem/{id}', "HospedagemController@exibirHospedagem");

Route::get('/EditarHospedagem/{id}', "HospedagemController@editar");

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

Route::get('/cadastroServico', function(Request $request) {
    return view('CadastroServico');
});

Route::post('/cadastroServico', "ServiçoController@adicionarServico");

Route::get('/listaServicos', "ServiçoController@listarServicos");

Route::get('/EditarServico/{id}', "ServiçoController@editar");

Route::post('/SalvarServico', "ServiçoController@salvar");

Route::get('/ExibirServico/{id}', "ServiçoController@exibirServico");

Route::get('/RemoverServico/{id}', "ServiçoController@remover");

Route::get('/inserirImagensServico', function(Request $request) {
    return view('InserirImagensServico');
});

Route::get('/InserirImagensServico/{id}', "ServiçoController@inserirImagensServico");


Route::post('/salvarImagemServico', "ServiçoController@salvarImagemServico");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/SalvarImagemServico', "ServiçoController@salvarImagemServico");

Route::get('/EditarImagensServico/{id}', "ServiçoController@editarImagens");

Route::get('/RemoverImagemServico/{id}', "ServiçoController@removerImagens");

