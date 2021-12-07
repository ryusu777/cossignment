<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrPostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_post_comments', function (Blueprint $table) {
            $table->id('comment_id');
            $table->foreignId('user_id');
            $table->foreignId('post_id');
            $table->text('comment_body');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('post_id')->on('tr_class_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_post_comments');
    }
}
