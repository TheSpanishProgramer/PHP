<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TesteMigracao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $sql = "CREATE SCHEMA IF NOT EXISTS schema_novo";
        DB::connection()->getPdo()->exec($sql);

        Schema::create("schema_novo.tabela_teste", function(Blueprint $table){
            $table->increments('id');
            $table->string('nome');

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
        Schema::drop("schema_novo.tabela_teste");
    }
}
