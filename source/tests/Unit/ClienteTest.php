<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClienteTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function test_if_name_can_be_assign()
	{
		$fakerCliente = factory(\App\Cliente::class)->create();

		$id = $fakerCliente->id;

		// Testa se o objeto criado foi salvo corretamente, e está disponivel no BD
		$cliente = \App\Cliente::find($id);
		$this->assertEquals($fakerCliente->nome, $cliente->nome);
	}

	public function test_if_client_can_be_deleted()
	{
		$fakerCliente = factory(\App\Cliente::class)->create();

		$id = $fakerCliente->id;

		// Testa se o objeto criado foi salvo corretamente, e está disponivel no BD
		$cliente = \App\Cliente::find($id);
		$this->assertEquals($fakerCliente->id, $cliente->id);

		$cliente->delete();

		// Testa se o objeto foi deletado, e não se encontra mais no BD
		$cliente = \App\Cliente::find($id);
		$this->assertEquals($cliente, null);
	}

	public function test_if_file_can_be_edited()
	{
		$fakerCliente = factory(\App\Cliente::class)->create();

		$id = $fakerCliente->id;

		// Testa se o objeto criado foi salvo corretamente, e está disponivel no BD
		$cliente = \App\Cliente::find($id);
		$this->assertEquals($fakerCliente->id, $cliente->id);

		$cliente->nome = 'Menino Neymar';
		$cliente->update();

		$cliente = \App\Cliente::find($id);
		$this->assertEquals('Menino Neymar', $cliente->nome);
	}
}
