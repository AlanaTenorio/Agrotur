<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->integer('anuncio_id')->unsigned();
            $table->integer('cliente_id')->unsigned();

            $table->foreign('anuncio_id')->references('id')->on('anuncios');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->primary(['cliente_id', 'anuncio_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favoritos');
    }
}
