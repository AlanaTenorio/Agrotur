<?php

namespace Tests\Unit;

use App\Anuncio;
use App\Servico;
use App\User;
use App\Transacao;
use Auth;
use Artisan;
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

		Artisan::call('migrate:refresh', ["--force"=> true ]);

		// cliente [0]: anunciante
		// cliente [1]: cliente comprador
		$fakeUser = factory(User::class, 2)->create();

		$fakeAnuncio = factory(Anuncio::class, 3)->create([
    	'anunciante_id' => $fakeUser[0]->id,
		]);

		$fakeServico1 = factory(Servico::class, 1)->create([
    	'anuncio_id' => $fakeAnuncio[0]->id,
			'categoria' => "Gastronomia"
		]);

		$fakeServico2 = factory(Servico::class, 1)->create([
    	'anuncio_id' => $fakeAnuncio[1]->id,
			'categoria' => "Gastronomia"
		]);

		$fakeServico3 = factory(Servico::class, 1)->create([
    	'anuncio_id' => $fakeAnuncio[2]->id,
			'categoria' => "Esporte"
		]);

		$transacao = new Transacao;
		$transacao->dataEntrada = "2019-08-08";
		$transacao->dataSaida = "2019-08-09";
		$transacao->precoTotal = 120;
		$transacao->quantPessoas = 1;
		$transacao->anuncio_id = $fakeAnuncio[0]->id;
		$transacao->cliente_id = $fakeUser[1]->id;
		$transacao->save();

    Auth::login($fakeUser[1], true);

    $controlador = new HomeController();
    $recomendados = $controlador->recomendarPorCategoria();

		// dd($recomendados);

		$servicos = array();
    foreach ($recomendados as $recomendado) {
			$servico = Servico::where('id', '=', $recomendado->id)->first();
			array_push($servicos, $servico);
		}

		$correct = True;
		foreach ($servicos as $servico) {
			if($servico->categoria == "Gastronomia"){
				$correct = $correct and True;
			}else{
				$correct = $correct and False;
			}
		}

    $this->assertEquals($correct, True);
	}
}
