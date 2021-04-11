<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('numero');
            $table->integer('asignatura_id')->unsigned()->index();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');
            $table->integer('profesor_id')->unsigned()->index();
            $table->foreign('profesor_id')->references('id')->on('profesores')->onDelete('cascade');
            $table->timestamps();
        });
    

     Schema::create('alumno_clase', function(Blueprint $table){
            
            $table->integer('alumno_id')->unsigned()->index();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->integer('clase_id')->unsigned()->index();
            $table->foreign('clase_id')->references('id')->on('clases')->onDelete('cascade');
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
        Schema::drop('alumno_clase');
        Schema::drop('clases');
    }
}
