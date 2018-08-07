<?php

namespace App;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

  protected $fillable = ['nome', 'senha', 'telefone', 'cpf', 'email'];

  public static $rules = [
    'nome'=>'required',
    'senha'=>'required|min:8|max:15|confirmed',
    'telefone'=>'required|digits:11', //regex:/^\(\d{2}\)\d{9}$/'
    'cpf'=>'required|cpf|unique:clientes,cpf',
    'email'=>'required|email|unique:clientes,email'
  ];

  public static $messages = [
		'required'=> 'O campo :attribute é obrigatório'
	];

  public function favorito(){
    return $this->hasMany('App\Favorito');
  }

  public function avaliacao_anuncios(){
    return $this->hasMany('App\Avaliacao_Anuncio');
  }
}
