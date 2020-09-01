<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdCriterioTableRespostas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // php artisan make:migration add_id_criterio_table_respostas --table=respostas
    public function up()
    {
        Schema::table('respostas', function (Blueprint $table) {
            $table->integer('id_criterio')->unsigned()->nullable();

            $table->foreign('id_criterio')->references('id_plvcriterio')->on('palavras_criterios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('respostas', function (Blueprint $table) {
            Schema::dropIfExists('id_criterio');         
            
        });
    }
}
