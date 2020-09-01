<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdTempoTablePalavrasCriterios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('palavras_criterios', function (Blueprint $table) {
            $table->integer('id_tempo')->unsigned();

            $table->foreign('id_tempo')->references('id_tempo')->on('tempo_verbos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('palavras_criterios', function (Blueprint $table) {
            $table->dropColumn('id_tempo');
        });
    }
}
