<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiezasProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piezas_profesores', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('id_pieza')->unsigned();
            $table->string('cedula');
            $table->string('instrumento');
            
            $table->foreign('id_pieza')
                  ->references('id')->on('piezas')
                  ->onDelete('cascade');

            $table->foreign('cedula')
                  ->references('cedula')->on('profesores')
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
        Schema::dropIfExists('piezas_profesores');
    }
}
