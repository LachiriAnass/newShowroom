<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaintingVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('painting_votes', function (Blueprint $table) {
            $table->id();
            $table->boolean('vote_type'); //true for upvote and false for downvote
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('painting_id');
            $table->timestamps();

            $table->foreign('painting_id')
                ->references('id')
                ->on('paintings')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('painting_votes');
    }
}
