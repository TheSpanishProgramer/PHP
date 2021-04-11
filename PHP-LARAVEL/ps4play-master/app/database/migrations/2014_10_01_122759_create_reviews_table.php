<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reviews', function(Blueprint $table)
		{
			$table->increments('id', true);
			$table->unsignedInteger('game_id');
			$table->string('username', 50);
			$table->string('title', 100);
			$table->text('review');
			$table->integer('stars');
			$table->timestamps();
			$table->foreign('game_id')->references('id')->on('games')->onDelete('CASCADE');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reviews');
	}

}

?>
