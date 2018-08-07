<?php

namespace Tests\Unit;

use App\Transacao;
use App\Avaliacao_Anuncio;
use App\Anuncio;
use Tests\TestCase;
use App\Validator\AvaliacaoValidator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AvaliacaoTest extends TestCase
{
	use RefreshDatabase;

	/**
	 *
	 *
	 * @return void
	 */
	public function test_if_rate_can_be_greater_than_five() {
		$this->expectException(\App\Validator\ValidationException::class);

		// cliente [0]: anunciante
		// cliente [1]: cliente avaliador
		$fakerCliente = factory(\App\Cliente::class, 2)->create();

		$anuncio = new Anuncio;
		$anuncio->preco = 60;
		$anuncio->descricao = "Lorem ipsum dolor sit amet...";
		$anuncio->anunciante_id = $fakerCliente[0]->id;
		$anuncio->save();

		$transacao = new Transacao;
		$transacao->dataEntrada = "2019-08-08";
		$transacao->dataSaida = "2019-08-09";
		$transacao->precoTotal = 120;
		$transacao->quantPessoas = 1;
		$transacao->anuncio_id = $anuncio->id;
		$transacao->cliente_id = $fakerCliente[1]->id;
		$transacao->save();

		$avaliacao = new Avaliacao_Anuncio;

		$avaliacao->nota = 6;

		$avaliacao->comentario = "Lorem ipsum dolor sit amet...";
		$avaliacao->anuncio_id = $anuncio->id;
		$avaliacao->user_id = $fakerCliente[1]->id;

		AvaliacaoValidator::validate($avaliacao->toArray());
	}

	public function test_if_user_can_rate_without_transaction(){
		$this->expectException(\App\Validator\ValidationException::class);

		// cliente [0]: anunciante
		// cliente [1]: cliente avaliador
		$fakerCliente = factory(\App\Cliente::class, 2)->create();

		$anuncio = new Anuncio;
		$anuncio->preco = 60;
		$anuncio->descricao = "Lorem ipsum dolor sit amet...";
		$anuncio->anunciante_id = $fakerCliente[0]->id;
		$anuncio->save();

		$avaliacao = new Avaliacao_Anuncio;

		$avaliacao->nota = 5;
		$avaliacao->comentario = "Lorem ipsum dolor sit amet...";
		$avaliacao->anuncio_id = $anuncio->id;
		$avaliacao->user_id = $fakerCliente[1]->id;

		AvaliacaoValidator::validate($avaliacao->toArray());
	}

}
