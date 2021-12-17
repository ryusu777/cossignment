<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_assignment', function (Blueprint $table) {
            $table->id('assignment_id');
            $table->foreignId('created_by');
            $table->foreignId('class_id');
            $table->string('assignment_title', 100);
            $table->dateTime('assignment_due');
            $table->text('assignment_description');
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
        Schema::dropIfExists('tr_assignment');
    }
}
