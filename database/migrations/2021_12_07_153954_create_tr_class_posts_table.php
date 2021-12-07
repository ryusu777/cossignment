<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrClassPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_class_posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->foreignId('created_by');
            $table->foreignId('class_id');
            $table->string('post_title', 255);
            $table->text('post_body');
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
        Schema::dropIfExists('tr_class_posts');
    }
}
