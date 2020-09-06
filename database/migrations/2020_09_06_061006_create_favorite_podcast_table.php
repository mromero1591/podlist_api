<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritePodcastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_podcasts', function (Blueprint $table) {
            $table->unsignedBigInteger('podcast_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('podcast_id')->references('id')->on('podcasts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_podcasts');
    }
}
