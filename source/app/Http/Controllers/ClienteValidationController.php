<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClienteValidationController extends Controller {
   public function showform(){
      return view('CadastroCliente');
   }

   public function validateform(Request $request){

      $this->validate($request,[
         'nome'=>'required',
         'senha'=>'required',
         'telefone'=>'required',
         'cpf'=>'required',
         'email'=>'required|email'
      ]);

      app('App\Http\Controllers\ClienteController')->adicionarCliente($request);
      return redirect ('/listaClientes');
   }
}
