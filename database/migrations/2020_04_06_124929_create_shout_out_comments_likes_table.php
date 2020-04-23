<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoutOutCommentsLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shout_out_comments_likes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('comment_id');
            $table->bigInteger('owner_id');
            $table->String('owner_name');
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
        Schema::dropIfExists('shout_out_comments_likes');
    }
}
