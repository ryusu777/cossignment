<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrQuizAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_quiz_answer', function (Blueprint $table) {
            $table->id('answer_id');
            $table->foreignId('question_id');
            $table->foreignId('student_id');
            $table->string('quiz_answer', 1);
            $table->timestamps();

            $table->foreign('question_id')->references('question_id')->on('tr_quiz_question');
            $table->foreign('student_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_quiz_answer');
    }
}
