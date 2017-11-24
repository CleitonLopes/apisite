<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('galeria', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('album_id')->unsigned();
            $table->string('nome', 100);
            $table->string('nome_original', 100);
            $table->string('extensao', 45);
            $table->string('tamanho', 45);
            $table->string('mime_type', 20);
            $table->string('path', 100);
            $table->timestamps();

            $table->foreign('album_id')
                    ->references('id')->on('albuns')
                    ->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeria');
    }
}
