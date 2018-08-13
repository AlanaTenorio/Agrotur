<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Validator\ClienteValidator;

class ClienteController extends Controller
{
    public function adicionarCliente(Request $request){

      try {
  			ClienteValidator::validate($request->all());

        $cliente = new \App\User();
        $cliente->nome = $request->nome;
        $cliente->senha = Hash::make($request->senha);
        $cliente->telefone = $request->telefone;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->save();

        Auth::login($cliente, true);

        return redirect ('/');
    	}catch(\App\Validator\ValidationException $e) {
        return back()->withErrors($e->getValidator())
                    ->withInput();
    	}
    }

    public function listarClientes(){
      $clientes = \App\Cliente::all();
      return view ('ListaClientes', ['clientes' => $clientes]);
    }

    public function editar($id) {
      $cliente = \App\Cliente::find($id);
      return view("EditarCliente", ['cliente' => $cliente]);
    }

    public function editarSenha($id) {
      $cliente = \App\Cliente::find($id);
      return view("EditarClienteSenha", ['cliente' => $cliente]);
    }

    public function salvar(Request $request){
      $validator = Validator::make($request->all(), [
        'nome'=>'required',
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

      $user = Auth::user();

      $user->nome = $request->nome;
      $user->telefone = $request->telefone;
      $user->cpf = $request->cpf;
      $user->email = $request->email;
      $user->save();

      return redirect ('/listaClientes');
    }

    public function salvarSenha(Request $request){
      $validator = Validator::make($request->all(), [
        'senha'=>'required',
        'novaSenha'=>'required|min:8|max:15|confirmed'
      ]);

      $validator->after(function ($validator) use ($request){
        if (!(Hash::check($request->get('senha'), Auth::user()->senha))) {
            $validator->errors()->add('senha', 'Senha informada não confere');
        }
        if(strcmp($request->get('senha'), $request->get('novaSenha')) == 0){
            $validator->errors()->add('novaSenha', 'Nova senha igual a senha atual');
        }
      });

      if ($validator->fails()) {
        return redirect()->action(
                'ClienteController@editarSenha', ['id' => $request->id]
               )->withErrors($validator)
                ->withInput();
      }

      $user = Auth::user();

      $user->senha = bcrypt($request->get('novaSenha'));
      $user->save();

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

    public function favoritarOuDesfavoritar(Request $request){
      $clienteId = Auth::user()->id;
      $anuncioId = $request->anuncio_id;

      $favorito = \App\Favorito::where([
          ['cliente_id', '=', $clienteId],
          ['anuncio_id', '=', $anuncioId],
      ])->first();

      if(!$favorito){
        $novo_favorito = new \App\Favorito();
        $novo_favorito->cliente_id = $clienteId;
        $novo_favorito->anuncio_id = $anuncioId;

        $novo_favorito->save();
        return back();
      }else{
        $favorito->delete();
        return back();
      }
    }

    public function visualizarFavoritos(){
      $clienteId = Auth::user()->id;
      $favoritos = \App\Favorito::where('cliente_id', '=', $clienteId)->get();

      return view("ExibirFavoritos", ['favoritos' => $favoritos]);
    }
    
    public function visualizarPerfil(){
      $clienteId = Auth::user()->id;
      $compras = \App\Transacao::where('cliente_id', '=', $clienteId)->get();
      $ads = \App\Anuncio::where('anunciante_id', $clienteId)->get();

      return view("Perfil", [
                            'compras' => $compras,
                            'ads' => $ads
                            ]
                  );
    }

    public function visualizarPerfilOutro(){
      $clienteId = Auth::user()->id;
      $favoritos = \App\Favorito::where('cliente_id', '=', $clienteId)->get();

      return view("Perfil", ['favoritos' => $favoritos]);
    }

    public function procurarAnuncio($id){
      $anuncio = \App\Anuncio::find($id);
      return $anuncio;
    }
    
    public static function getDadosCliente($id) {
      $client = DB::table('clientes')->where('id', $id)->first();
      $purchases = array(0);
      $ads = array(0);
      $ratingAsASeller = 0;

      return [
          'client' => $client,
          'purchases' => $purchases,
          'ads' => $ads,
          'rating' => $ratingAsASeller,
      ];
  }
}
