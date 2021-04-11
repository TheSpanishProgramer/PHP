<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarTableAndSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "CREATE SCHEMA IF NOT EXISTS calendars;";
        DB::connection()->getPdo()->exec($sql);

        Schema::create('calendars.calendars', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->index()->unsigned();
            $table->string("title", 255);
            $table->text("description");
            $table->timestamps();

            $table->foreign('user_id')->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('calendars.calendars');
    }
}
