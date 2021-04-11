<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticuloVendedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('articulo_vendedor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('articulo_id')->unsigned();
            $table->bigInteger('vendedor_id')->unsigned();
            $table->float('pvp', 8,2);
            $table->bigInteger('cantidad');
            $table->string('cliente');
            $table->timestamps();
            //creamos las foreign keys hay dos alumno_id y modulo_id
            $table->foreign('articulo_id')
            ->references('id')
            ->on('articulos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('vendedor_id')
            ->references('id')
            ->on('vendedors')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('articulo_vendedor');
    }
}
