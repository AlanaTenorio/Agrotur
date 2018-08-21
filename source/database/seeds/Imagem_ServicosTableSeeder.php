<?php

use Illuminate\Database\Seeder;

class Imagem_ServicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Imagem_Servico::class, 50)->create();
    }
}
