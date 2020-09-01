<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdTemaTableOcasioes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ocasioes', function (Blueprint $table) {
            $table->integer('id_tema')->unsigned()->nullable();
            $table->foreign('id_tema')->references('id_tema')->on('temas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ocasioes', function (Blueprint $table) {
            Schema::dropIfExists('id_tema');
        });
    }
}
