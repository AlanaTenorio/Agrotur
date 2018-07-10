<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("cidade");
            $table->string("estado");
            $table->string("rua");
            $table->string("numero");
            $table->string("bairro");
            $table->string("cep");
            $table->string("complemento");
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
        Schema::dropIfExists('enderecos');
    }
}
