<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenhaAcaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senha_acaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fila_id')->constrained()->unsigned()->nullable();
            $table->foreignId('local_id')->constrained()->unsigned()->nullable();
            $table->string('tipo');
            $table->dateTime('entrada');
            $table->dateTime('atendimento_inicio');
            $table->dateTime('saida');
            $table->integer('tempo_espera');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senha_acaos');
    }
}
