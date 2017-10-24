<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableGaleria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galeria', function (Blueprint $table) {

            $table->string('nome_original', 45);
            $table->string('extensao', 45);
            $table->string('tamanho', 45);
            $table->string('mime_type', 10);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galeria', function(Blueprint $table) {

            $table->dropCollumn('nome_original');
            $table->dropCollumn('extensao');
            $table->dropCollumn('tamanho');
            $table->dropCollumn('mime_type');

        });
    }
}
