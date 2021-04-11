<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->decimal('costo', 8, 2);
            $table->timestamps();
        });
        //Para crear la tabla pivote en una relacion muchos a muchos los nombres de la 2 tablas debene estar escrito en singular. Ejemplo: Articles & Tags => article & tag => article_tag
       Schema::create('profesional_servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profesional_id')->unsigned();
            $table->integer('servicio_id')->unsigned();

            $table->foreign('profesional_id')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('sede_servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sede_id')->unsigned();
            $table->integer('servicio_id')->unsigned();

            $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
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
        Schema::dropIfExists('servicios');
    }
}
