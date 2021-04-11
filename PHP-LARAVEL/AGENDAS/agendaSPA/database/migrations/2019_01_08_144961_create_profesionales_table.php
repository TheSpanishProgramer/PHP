<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('cedula',50);
            $table->string('email',50);
            $table->string('telefono',50);
            $table->enum('status',['activo','suspendido'])->default('activo');
            $table->integer('sede_id')->unsigned();
            $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');
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
        Schema::dropIfExists('profesionales');
    }
}
