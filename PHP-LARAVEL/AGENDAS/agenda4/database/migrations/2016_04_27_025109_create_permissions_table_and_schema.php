<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTableAndSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $sql = "CREATE SCHEMA IF NOT EXISTS permissions;";
        DB::connection()->getPdo()->exec($sql);

        Schema::create('permissions.permissions', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("url");
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
        Schema::drop('permissions.permissions');
    }
}
