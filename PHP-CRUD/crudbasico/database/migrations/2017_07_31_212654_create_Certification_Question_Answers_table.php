<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('answers');
            $table->boolean('valid')->default(false);
            $table->integer('certification_question_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('certification_question_answers', function($table) {
            $table->foreign('certification_question_id')->references('id')->on('certification_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certification_question_answers');
    }
}
