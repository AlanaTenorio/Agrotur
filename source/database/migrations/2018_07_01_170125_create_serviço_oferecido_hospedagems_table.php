<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiçoOferecidoHospedagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviço_oferecido_hospedagems', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('serviço');
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
        Schema::dropIfExists('serviço_oferecido_hospedagems');
    }
}
