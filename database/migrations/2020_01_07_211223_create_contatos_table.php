<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->text('mensagem');
            $table->string('local_arquivo');
            $table->string('ip');
            $table->timestamp('dt_envio')->useCurrent = true;
        });
    }

    public function down()
    {
        Schema::dropIfExists('contatos');
    }
}