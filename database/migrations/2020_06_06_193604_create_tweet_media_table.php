<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweet_media', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tweet_id')->index()->nullable();
            $table->foreign('tweet_id')
                ->references('id')
                ->on('tweets')
                ->onDelete('cascade');

            $table->foreignId('media_id')->index()->nullable();
            $table->foreign('media_id')
                ->references('id')
                ->on('media')
                ->onDelete('cascade');


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
        Schema::dropIfExists('tweet_media');
    }
}
