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
      return redirect ('/listaClientes');
    }

    public function listarClientes(){
      $clientes = \App\Cliente::all();
      return view ('ListaClientes', ['clientes' => $clientes]);
    }
}
