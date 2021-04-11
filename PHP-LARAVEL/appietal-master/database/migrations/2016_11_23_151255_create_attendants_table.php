<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomPapa');
            $table->string('docPapa');
            $table->string('telPapa');
            $table->string('dirPapa');
            $table->string('nomMama');
            $table->string('docMama');
            $table->string('telMama');
            $table->string('dirMama');
            $table->string('nomAcudiente');
            $table->string('docAcudiente');
            $table->string('telAcudiente');
            $table->string('dirAcudiente');

            //relation
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
        Schema::drop('attendants');
    }
}
