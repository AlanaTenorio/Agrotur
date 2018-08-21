<?php

use Illuminate\Database\Seeder;

class TransacaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Transacao::class, 50)->create();
    }
}
