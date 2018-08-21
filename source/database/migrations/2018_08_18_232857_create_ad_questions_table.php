<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('question');
            $table->text('answer')->nullable();

            $table->integer('ad_id')->unsigned();
            $table->integer('client_id')->unsigned();

            $table->foreign('ad_id')->references('id')->on('anuncios')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_questions');
    }
}
