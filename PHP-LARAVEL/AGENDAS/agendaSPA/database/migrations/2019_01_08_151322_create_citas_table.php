<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('reservacion');
            $table->string('notas');
            $table->enum('status',['Reservada','En Proceso','FInalizada','Cancelada'])->default('Reservada');
            //Foreign Keys
            $table->integer('user_id')->unsigned();
            $table->integer('sede_id')->unsigned();
            $table->integer('servicio_id')->unsigned();
            $table->integer('profesional_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            //conditions for foreign keys-condiciones para las claves foraneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
            $table->foreign('profesional_id')->references('id')->on('profesionales')->onDelete('cascade');
           $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

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
        Schema::dropIfExists('citas');
    }
}
