<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_quiz', function (Blueprint $table) {
            $table->id('quiz_id');
            $table->foreignId('created_by');
            $table->foreignId('class_id');
            $table->string('quiz_title', 50);
            $table->dateTime('quiz_due');
            $table->time('quiz_duration');
            $table->text('quiz_description');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('class_id')->references('class_id')->on('tr_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_quiz');
    }
}
