<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function adicionarCliente(Request $request){
      $validator = Validator::make($request->all(), [
        'nome'=>'required',
        'senha'=>'required|min:8|max:15|confirmed',
        'telefone'=>'required|digits:11', //regex:/^\(\d{2}\)\d{9}$/'
        'cpf'=>'required|cpf',
        'email'=>'required|email|unique:clientes,email'
      ]);

      if ($validator->fails()) {
          return redirect('/cadastroCliente')
                      ->withErrors($validator)
                      ->withInput();
      }

      $cliente = new \App\Cliente();
      $cliente->nome = $request->nome;
      $cliente->senha = Hash::make($request->senha);
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

    public function editar($id) {
      $cliente = \App\Cliente::find($id);
      return view("EditarCliente", ['cliente' => $cliente]);
    }

    public function salvar(Request $request){
      $validator = Validator::make($request->all(), [
        'nome'=>'required',
        'senha'=>'required|min:8|max:15',
        'telefone'=>'required|digits:11', //regex:/^\(\d{2}\)\d{9}$/'
        'cpf'=>'required|cpf',
        'email'=>'required|email'
      ]);

      if ($validator->fails()) {
        return redirect()->action(
                'ClienteController@editar', ['id' => $request->id]
               )->withErrors($validator)
                ->withInput();
      }

      $cliente = \App\Cliente::find($request->id);
      $cliente->nome = $request->nome;
      $cliente->senha = Hash::make($request->senha);
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
