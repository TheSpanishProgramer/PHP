<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Esta tabla es para registrar los horarios libres de los profesores.*/
        Schema::create('horarios_profesores', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('id_horario')->unsigned();
            $table->string('cedula');
            
            $table->foreign('id_horario')
                  ->references('id')->on('horarios')
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
        Schema::dropIfExists('horarios_profesores');
    }
}
