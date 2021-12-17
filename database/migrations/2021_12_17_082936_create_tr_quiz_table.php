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
