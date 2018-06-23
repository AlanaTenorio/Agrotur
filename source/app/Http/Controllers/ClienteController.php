<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function adicionarCliente(Request $request){
      $cliente = new \App\Cliente();
      $cliente->nome = $request->nome;
      $cliente->senha = $request->senha;
      $cliente->telefone = $request->telefone;
      $cliente->cpf = $request->cpf;
      $cliente->email = $request->email;
      $cliente->save();
    }

    public function listarClientes(){
      $clientes = \App\Cliente::all();
      return view ('ListaClientes', ['clientes' => $clientes]);
    }

    public function editar($id) {
      $cliente = \App\Cliente::find($id);
      return view("EditarCliente", ['cliente' => $cliente]);
    }

    public function salvar(Request $request){
      $cliente = \App\Cliente::find($request->id);
      $cliente->nome = $request->nome;
      $cliente->senha = $request->senha;
      $cliente->telefone = $request->telefone;
      $cliente->cpf = $request->cpf;
      $cliente->email = $request->email;
      $cliente->update();
      return redirect ('/listaClientes');
    }

    public function remover(Request $request){
      $cliente = \App\Cliente::find($request->id);
      return view("/RemoverCliente", ['cliente' => $cliente]);
    }

    public function apagar(Request $request){
      $cliente = \App\Cliente::find($request->id);
      $cliente->delete();
      return redirect("/listaClientes");
    }
}
