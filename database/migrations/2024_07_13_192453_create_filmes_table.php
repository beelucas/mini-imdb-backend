<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id(); 
            $table->string('titulo');
            $table->string('genero');
            $table->integer('ano_lancamento');
            $table->string('diretor');
            $table->text('elenco');
            $table->text('sinopse');
            $table->timestamps();
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('filmes');
    }
};
