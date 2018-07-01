<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiçosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviços', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nomeServiço');
            $table->decimal('preço');
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
        Schema::dropIfExists('serviços');
    }
}
