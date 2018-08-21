<?php

use Illuminate\Database\Seeder;

class Imagem_HospedagemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Imagem_Hospedagem::class, 50)->create();
    }
}
