<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes_representantes', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->string('cedula_estudiante');
            $table->string('cedula_representante');
            
            $table->foreign('cedula_estudiante')
                  ->references('cedula')->on('estudiantes')
                  ->onDelete('cascade');

            $table->foreign('cedula_representante')
                  ->references('cedula')->on('representantes')
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
        Schema::dropIfExists('estudiantes_representantes');
    }
}
