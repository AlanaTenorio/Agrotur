<?php

use Illuminate\Database\Seeder;

class Avaliacao_AnunciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Avaliacao_Anuncio::class, 50)->create();
    }
}
