<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewCampoAlbuns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albuns', function (Blueprint $table) {
            $table->string('path', 100)->default('http://api.estanciabreda.com.br/storage/default/semImagem.png');
            $table->boolean('image')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('albuns', function (Blueprint $table) {
            $table->dropcolumn('path');
            $table->dropcolumn('image');
        });
    }
}
