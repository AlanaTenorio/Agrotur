<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Validator\ClienteValidator;
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
	public function test_if_cpf_can_be_empty(){
		$this->expectException(\App\Validator\ValidationException::class);

		$fakerCliente = factory(\App\Cliente::class)->make();

		$fakerCliente->cpf = "";

		$array = $fakerCliente->toArray();
		$array["senha_confirmation"] = $fakerCliente->senha;

		ClienteValidator::validate($array);

	}

	public function test_if_cpf_can_be_repeated(){
		$this->expectException(\App\Validator\ValidationException::class);

		$fakerCliente1 = factory(\App\Cliente::class)->create();

		$fakerCliente2 = factory(\App\Cliente::class)->make();

		$fakerCliente2->cpf = $fakerCliente1->cpf;

		$array = $fakerCliente2->toArray();
		$array["senha_confirmation"] = $fakerCliente2->senha;

		ClienteValidator::validate($array);
	}

}
