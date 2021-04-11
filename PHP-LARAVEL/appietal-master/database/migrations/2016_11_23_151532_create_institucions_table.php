<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('institucions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('sede');
          $table->string('grado');
          $table->string('jornada');
    

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
