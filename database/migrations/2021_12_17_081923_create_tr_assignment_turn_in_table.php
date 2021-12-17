<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrAssignmentTurnInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_assignment_turn_in', function (Blueprint $table) {
            $table->id('turn_in_id');
            $table->foreignId('student_id');
            $table->foreignId('assignment_id');
            $table->string('file_link', 255);
            $table->text('body');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('assignment_id')->references('assignment_id')->on('tr_assignment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_assignment_turn_in');
    }
}
