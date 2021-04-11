<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->string('cedula')->primary();
            
            $table->string('nombre');
            $table->string('apellido');
            $table->string('lugar_nacimiento');
            $table->date('fecha_nacimiento');
            $table->char('sexo');
            $table->string('instituto');
            $table->string('correo_electronico')->unique();
            $table->string('numero_telefonico');
            $table->string('nivel_instituto');

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
        Schema::dropIfExists('estudiantes');
    }
}
