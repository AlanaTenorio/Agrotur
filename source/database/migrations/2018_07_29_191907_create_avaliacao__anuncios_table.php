<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao__anuncios', function (Blueprint $table) {
            $table->timestamps();
            $table->integer('nota');
            $table->string('comentario');

            $table->integer('anuncio_id')->unsigned();
            $table->integer('cliente_id')->unsigned();

            $table->foreign('anuncio_id')->references('id')->on('anuncios');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->primary(['cliente_id', 'anuncio_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao__anuncios');
    }
}
