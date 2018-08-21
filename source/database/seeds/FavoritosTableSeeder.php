<?php

use Illuminate\Database\Seeder;

class FavoritosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         factory(App\Favorito::class, 50)->create();
     }
}
