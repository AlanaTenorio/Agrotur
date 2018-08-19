<?php

namespace Tests\Unit;

use App\Hospedagem;
use App\Anuncio;
use App\Endereco;
use Tests\TestCase;
use App\Repositories\HospedagemRepository;
use App\Validator\HospedagemValidator;
use App\Validator\AnuncioValidator;
use App\Validator\EnderecoValidator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HospedagemTest extends TestCase
{

  use RefreshDatabase;

  private $hospedagem = [
    'descricao' => 'O Grande Hotel Budapeste é ambientado na Europa da década de 30, em um país fictício conhecido como República de Zubrowka',
    'nomePropriedade' => 'Hotel Budapeste',
    'preco' => 100,
    'cidade' => 'Varsovia',
    'estado' => 'Polonia',
    'rua' => 'Rua das Amarguras',
    'numero' => 's/n',
    'bairro' => 'Bairro das Tristezas',
    'cep' => '12345678',
    'complemento' => 'Casa vermelha'
  ];

	public function test_if_description_can_be_empty() {
		$this->expectException(\App\Validator\ValidationException::class);

    $this->hospedagem['descricao'] = '';

		HospedagemValidator::validate($this->hospedagem);
	}

  public function test_if_title_can_be_empty() {
		$this->expectException(\App\Validator\ValidationException::class);

    $this->hospedagem['nomePropriedade'] = '';

		HospedagemValidator::validate($this->hospedagem);
	}

  public function test_if_state_can_be_empty() {
		$this->expectException(\App\Validator\ValidationException::class);

    $this->hospedagem['estado'] = '';

		HospedagemValidator::validate($this->hospedagem);
	}

  public function test_if_hospedagem_is_assigned_to_endereco() {

    $fakerCliente = factory(\App\Cliente::class)->create();

    $a = [
      'anunciante_id' => $fakerCliente->id,
      'preco' => $this->hospedagem['preco'],
      'descricao' => $this->hospedagem['descricao'],
    ];

    $h = [
      'nomePropriedade' => $this->hospedagem['nomePropriedade']
    ];

    $e = [
      'cidade' => $this->hospedagem['cidade'],
      'estado' => $this->hospedagem['estado'],
      'rua' => $this->hospedagem['rua'],
      'numero' => $this->hospedagem['numero'],
      'bairro' => $this->hospedagem['bairro'],
      'cep' => $this->hospedagem['cep'],
      'complemento' => $this->hospedagem['complemento'],
    ];

    $repo = new HospedagemRepository;
    $hospedagemID = $repo->saveHospedagem($a, $h, $e, null);

    $hospedagem = Hospedagem::find($hospedagemID);

    $endereco = Endereco::where('anuncio_id', '=', $hospedagem->anuncio_id)->first();

    $this->assertEquals($endereco->cidade, $e['cidade']);

	}

}
