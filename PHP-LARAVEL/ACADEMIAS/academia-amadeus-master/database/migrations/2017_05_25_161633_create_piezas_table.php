<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piezas', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('id_concierto')->unsigned();
            $table->integer('id_tema')->unsigned();
            $table->string('cedula_director');
            
            $table->foreign('id_concierto')
                  ->references('id')->on('conciertos')
                  ->onDelete('cascade');
            
            $table->foreign('id_tema')
                  ->references('id')->on('temas')
                  ->onDelete('cascade');

            $table->foreign('cedula_director')
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
        Schema::dropIfExists('piezas');
    }
}
