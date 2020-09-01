<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdRepostaTablePalavrasCriterios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // php artisan make:migration add_id_reposta_table_palavras_criterios --table=palavras_criterios
    public function up()
    {
        Schema::table('palavras_criterios', function (Blueprint $table) {
            $table->integer('id_resposta')->unsigned()->default(1);

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
        Schema::table('palavras_criterios', function (Blueprint $table) {
            $table->dropColumn('id_resposta');    
        });
    }
}
