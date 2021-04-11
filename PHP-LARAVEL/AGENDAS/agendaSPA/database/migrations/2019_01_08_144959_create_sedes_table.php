<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('address');
            $table->string('telefono',10);
            $table->string('email',50)->unique();
            $table->enum('status',['activo', 'suspendido'])->default('activo');
            $table->timestamps();
        });
  /*    Era una version preliminar de la base de datos donde un cliente podía estar registrado en varias sedes
        Schema::create('cliente_sede', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('cliente_id')->unsigned();
             $table->integer('sede_id')->unsigned();
             $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');
             $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
             $table->timestamps();
         });*/
    }
    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sedes');
    }
}
