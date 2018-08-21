<?php

use Illuminate\Database\Seeder;

class HospedagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Hospedagem::class, 50)->create();
    }
}
