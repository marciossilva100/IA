<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailTableClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //  php artisan make:migration add_email_table_clientes --table=clientes
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            Schema::dropIfExists('email');

        });
    }
}
