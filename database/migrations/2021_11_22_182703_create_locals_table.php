<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('rotulo');
            $table->string('status')->default('ATIVO');
            $table->foreignId('fila_id')->constrained()->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Create table for associating roles to users and teams (Many To Many Polymorphic)
        Schema::create('filaables', function (Blueprint $table) {
            $table->unsignedBigInteger('fila_id');
            $table->unsignedBigInteger('filaable_id');
            $table->string('filaable_type');
        });

        // Create table for associating roles to users and teams (Many To Many Polymorphic)
        Schema::create('fila_encables', function (Blueprint $table) {
            $table->unsignedBigInteger('fila_id');
            $table->unsignedBigInteger('fila_encable_id');
            $table->string('fila_encable_type');
        });        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filaables');
        Schema::dropIfExists('fila_encables');        
        Schema::dropIfExists('locals');
    }
}
