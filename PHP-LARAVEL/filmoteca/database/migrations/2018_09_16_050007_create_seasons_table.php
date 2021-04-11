<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->string('uuid', 36)->primary();
            $table->string('tv_uuid', 36);
            $table->string('name')->nullable();
            $table->text('plot')->nullable();
            $table->integer('season')->unsigned();
            $table->timestamps();
        });

        Schema::table('seasons', function (Blueprint $table) {
            $table->foreign('tv_uuid')
                ->references('uuid')
                ->on('tvs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
}
