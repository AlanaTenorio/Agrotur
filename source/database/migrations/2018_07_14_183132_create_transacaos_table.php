<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('dataEntrada');
            $table->dateTime('dataSaida')->nullable();
            $table->decimal('precoTotal');
            //disponivel ou não
            $table->boolean('status');
            $table->integer('quantPessoas');
            $table->integer('anuncio_id');
            $table->foreign('anuncio_id')->references('id')->on('anuncios');
            $table->integer('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacaos');
    }
}
