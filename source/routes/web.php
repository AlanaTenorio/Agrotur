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

Route::post('/cadastroCliente', "ClienteController@adicionarCliente");

Route::get('/RemoverCliente/{id}', "ClienteController@remover");

Route::get('/EditarCliente/{id}', "ClienteController@editar");

Route::post('/ApagarCliente', "ClienteController@apagar");

Route::post('/SalvarCliente', "ClienteController@salvar");
