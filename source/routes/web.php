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

Route::get('/inserirServicosHospedagem', function(Request $request) {
    return view('InserirServicosHospedagem');
});

Route::get('/inserirImagensServico', function(Request $request) {
    return view('InserirImagensServico');
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

Route::get('/InserirImagens/{id}', "HospedagemController@inserirImagens");

Route::post('/SalvarImagem', "HospedagemController@salvarImagem");

Route::get('/EditarImagens/{id}', "HospedagemController@editarImagens");

Route::get('/RemoverImagem/{id}', "HospedagemController@removerImagens");

Route::get('/InserirServicosHospedagem/{id}', "HospedagemController@inserirServicosOferecidos");

Route::post('/salvarServicosOferecidos', "HospedagemController@salvarServicosOferecidos");

Route::get('/cadastroServico', function(Request $request) {
    return view('CadastroServico');
});

Route::post('/cadastroServico', "ServiçoController@adicionarServico");

Route::get('/InserirImagensServico/{id}', "ServiçoController@inserirImagensServico");

Route::post('/salvarImagemServico', "ServiçoController@salvarImagemServico");
