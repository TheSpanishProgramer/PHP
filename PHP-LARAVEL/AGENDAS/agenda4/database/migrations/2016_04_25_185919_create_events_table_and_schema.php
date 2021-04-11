<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTableAndSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Cria o schema caso ele não exista
        $sql = "
            CREATE SCHEMA IF NOT EXISTS events;
            CREATE SCHEMA IF NOT EXISTS calendars;
        ";
        DB::connection()->getPdo()->exec($sql);

        Schema::create('events.events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("calendar_id")->index()->unsigned();
            $table->string("name", 255);
            $table->text("description");
            $table->date("day");
            $table->timestamps();

            $table->foreign("calendar_id")->references("id")->on("calendars.calendars")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //dps verificar como fica para tirar as foreign key
        Schema::drop('events.events');
    }
}
