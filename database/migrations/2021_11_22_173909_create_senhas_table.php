<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senhas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('tipo');
            $table->dateTime('inicio');            
            $table->dateTime('fim');
            $table->string('status')->default('ATIVO');
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
        Schema::dropIfExists('senhas');
    }
}
