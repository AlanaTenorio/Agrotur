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
    'lodging_description' => 'O Grande Hotel Budapeste é ambientado na Europa da década de 30, em um país fictício conhecido como República de Zubrowka',
    'lodging_title' => 'Hotel Budapeste',
    'lodging_price' => 100,
    'lodging_municipality' => 'Varsovia',
    'lodging_state' => 'Polonia',
    'lodging_street' => 'Rua das Amarguras',
    'lodging_street_number' => 's/n',
    'lodging_neighbourhood' => 'Bairro das Tristezas',
    'lodging_postal_code' => '12345678',
    'lodging_address_complement' => 'Casa vermelha'
  ];
	/**
	 *
	 *
	 * @return void
	 */
	public function test_if_description_can_be_empty() {
		$this->expectException(\App\Validator\ValidationException::class);

    $this->hospedagem['lodging_description'] = '';

		HospedagemValidator::validate($this->hospedagem);
	}

  public function test_if_title_can_be_empty() {
		$this->expectException(\App\Validator\ValidationException::class);

    $this->hospedagem['lodging_title'] = '';

		HospedagemValidator::validate($this->hospedagem);
	}

  public function test_if_state_can_be_empty() {
		$this->expectException(\App\Validator\ValidationException::class);

    $this->hospedagem['lodging_state'] = '';

		HospedagemValidator::validate($this->hospedagem);
	}

  public function test_if_hospedagem_is_assigned_to_endereco() {

    $fakerCliente = factory(\App\Cliente::class)->create();

    $a = [
      'anunciante_id' => $fakerCliente->id,
      'preco' => $this->hospedagem['lodging_price'],
      'descricao' => $this->hospedagem['lodging_description'],
    ];

    $h = [
      'nomePropriedade' => $this->hospedagem['lodging_title']
    ];

    $e = [
      'cidade' => $this->hospedagem['lodging_municipality'],
      'estado' => $this->hospedagem['lodging_state'],
      'rua' => $this->hospedagem['lodging_street'],
      'numero' => $this->hospedagem['lodging_street_number'],
      'bairro' => $this->hospedagem['lodging_neighbourhood'],
      'cep' => $this->hospedagem['lodging_postal_code'],
      'complemento' => $this->hospedagem['lodging_address_complement'],
    ];

    $repo = new HospedagemRepository;
    $hospedagemID = $repo->saveHospedagem($a, $h, $e);

    $hospedagem = Hospedagem::find($hospedagemID);

    $endereco = Endereco::where('anuncio_id', '=', $hospedagem->anuncio_id)->first();

    $this->assertEquals($endereco->cidade, $e['cidade']);

	}

}
