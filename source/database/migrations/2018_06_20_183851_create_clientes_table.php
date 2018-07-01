<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up(){
      Schema::create('clientes', function (Blueprint $table){
        $table->increments('id');
        $table->timestamps();
        $table->string('nome');
        $table->string('senha');
        $table->string('telefone');
        $table->string('cpf')->unique();;
        $table->string('email')->unique();;
      });
    }

    public function down(){
      Schema::dropIfExists('clientes');
    }
}
