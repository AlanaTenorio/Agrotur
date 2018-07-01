<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospedagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospedagems', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nomePropriedade');
            $table->decimal('preçoDiaria');
            $table->integer('anuncio_id');
            $table->foreign('anuncio_id')->references('id')->on('anuncios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospedagems');
    }
}
