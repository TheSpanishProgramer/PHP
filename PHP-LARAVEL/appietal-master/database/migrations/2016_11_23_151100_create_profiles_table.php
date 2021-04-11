<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('profiles', function (Blueprint $table) {
          $table->increments('id');
          $table->string('numDoc');
          $table->enum('tipoDoc',['Cedula','Tarjeta de identidad','Registro Civil']);
          $table->string('lugarNa');
          $table->date('feNa');
          $table->string('direccion');
          $table->string('telefono');
          $table->integer('estracto');
          $table->string('rh');
          $table->char('sexo');
          $table->string('seguridadS');
          $table->string('sisben');
          $table->string('procedencia');
          $table->string('foto');//fille
          $table->boolean('desplazado');
          $table->boolean('madreC');
          $table->string('lugarDeplazado');
          $table->string('epsFile');//fille
          $table->string('sisbenFile');//fille
          $table->string('docFile');//FILLE

          //relaciones con la tabla usuario
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')
          ->on('users')
          ->onDelete('cascade')
          ->onUpdate('cascade');
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
        //
    }
}
