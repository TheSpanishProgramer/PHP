<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions.permissions_users', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('user_id')->index()->unsigned()->foreign()->references('id')->on('users');
            $table->integer('permission_id')->index()->unsigned()->foreign()->references('id')->on('permissions.permissions');
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
        Schema::drop('permissions.permissions_users');
    }
}
