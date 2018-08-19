<?php

use Illuminate\Database\Seeder;

class ServicoOferecidoHospedagemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\servicoOferecido_hospedagem::class, 50)->create();
    }
}
