<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiezasEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piezas_estudiantes', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('id_pieza')->unsigned();
            $table->string('cedula');
            $table->string('registro');
            $table->string('instrumento');
            
            $table->foreign('id_pieza')
                  ->references('id')->on('piezas')
                  ->onDelete('cascade');

            $table->foreign('cedula')
                  ->references('cedula')->on('estudiantes')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piezas_estudiantes');
    }
}
