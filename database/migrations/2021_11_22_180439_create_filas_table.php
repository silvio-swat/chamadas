<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('status')->default('ATIVO');
            $table->string('prioridade');
            $table->string('temp_minimo_atend')->nullable();
            $table->string('temp_maximo_atend')->nullable();
            $table->string('temp_ideal_atend')->nullable();
            $table->string('temp_maximo_espera')->nullable();
            $table->boolean('pref_max_prio')->nullable();
            $table->string('qtd_senhas')->nullable();
            $table->string('qtd_senhas_preferen')->nullable();
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
        Schema::dropIfExists('filas');
    }
}