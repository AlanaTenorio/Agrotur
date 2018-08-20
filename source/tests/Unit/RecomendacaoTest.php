<?php

namespace Tests\Unit;

use App\Transacao;
use App\Avaliacao_Anuncio;
use App\Anuncio;
use Auth;
use App\Http\Controllers\HomeController;
use Tests\TestCase;
use App\Validator\AvaliacaoValidator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecomendacaoTest extends TestCase
{
	use RefreshDatabase;

	/**
	 *
	 *
	 * @return void
	 */
	public function test_if_recomendation_by_category_is_correct() {

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

    Auth::login($fakerCliente[1], true);

    $controlador = new HomeController();

    $recomendados = $controlador->recomendarPorCategoria();

    foreach ($variable as $key => $value) {

    }

    // $this->assertEquals(\App\Validator\ValidationException::class, );
	}
}
