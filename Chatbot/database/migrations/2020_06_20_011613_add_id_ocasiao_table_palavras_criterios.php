<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdOcasiaoTablePalavrasCriterios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('palavras_criterios', function (Blueprint $table) {
            $table->integer('id_ocasiao')->unsigned();

            $table->foreign('id_ocasiao')->references('id_ocasiao')->on('ocasioes')->onDelete('cascade');
            
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
            $table->dropColumn('id_ocasiao');
            
        });
    }
}
