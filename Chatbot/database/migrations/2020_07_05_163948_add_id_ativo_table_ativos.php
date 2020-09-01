<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdAtivoTableAtivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('palavras_clientes', function (Blueprint $table) {
            $table->integer('id_ativo')->unsigned()->nullable();

            $table->foreign('id_ativo')->references('id_ativo')->on('ativos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('palavras_clientes', function (Blueprint $table) {
            Schema::dropIfExists('id_ativo');         
        });
    }
}
