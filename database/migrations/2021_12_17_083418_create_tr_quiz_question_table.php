<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrQuizQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_quiz_question', function (Blueprint $table) {
            $table->id('question_id');
            $table->foreignId('quiz_id');
            $table->text('question_body');
            $table->text('question_choices');
            $table->string('correct_answer', 1);
            $table->timestamps();

            $table->foreign('quiz_id')->references('quiz_id')->on('tr_quiz');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_quiz_question');
    }
}
