<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->string('cedula')->primary();
            
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('telefono_casa');
            $table->string('telefono_celular');
            $table->string('telefono_trabajo');
            $table->string('correo_electronico')->unique();
            $table->string('profesion');
            $table->string('empresa');

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
        Schema::dropIfExists('representantes');
    }
}
