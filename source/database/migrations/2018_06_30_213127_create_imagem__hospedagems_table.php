<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagemHospedagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagem__hospedagems', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->binary('imagem');
            $table->integer('hospedagem_id');
            $table->foreign('hospedagem_id')->references('id')->on('hospedagems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagem__hospedagems');
    }
}
