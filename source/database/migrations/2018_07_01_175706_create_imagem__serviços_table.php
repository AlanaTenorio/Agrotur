<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagemServiçosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagem__serviços', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('imagem');
            $table->integer('serviço_id');
            $table->foreign('serviço_id')->references('id')->on('serviços');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagem__serviços');
    }
}
