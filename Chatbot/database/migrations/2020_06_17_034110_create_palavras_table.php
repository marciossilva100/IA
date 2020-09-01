<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalavrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palavras', function (Blueprint $table) {

            $table->increments('id_palavra');
            $table->text('palavra');

            $table->integer('id_resposta')->unsigned();
            $table->timestamps();

            $table->foreign('id_resposta')->references('id_resposta')->on('respostas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('palavras');
    }
}
