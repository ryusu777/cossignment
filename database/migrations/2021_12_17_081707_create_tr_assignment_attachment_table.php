<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrAssignmentAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_assignment_attachment', function (Blueprint $table) {
            $table->id('assignment_attachment_id');
            $table->foreignId('assignment_id');
            $table->string('file_name', 255);
            $table->string('file_link', 511);
            $table->timestamps();

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
        Schema::dropIfExists('tr_assignment_attachment');
    }
}
