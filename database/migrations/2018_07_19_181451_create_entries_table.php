<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->tinyInteger('week');
            $table->string('picks_made', 10);
            $table->string('thursday_picked_by', 10)->nullable();
            $table->string('weekend_picked_by', 10)->nullable();
            $table->tinyInteger('game_1')->nullable();
            $table->tinyInteger('game_2')->nullable();
            $table->tinyInteger('game_3')->nullable();
            $table->tinyInteger('game_4')->nullable();
            $table->tinyInteger('game_5')->nullable();
            $table->tinyInteger('game_6')->nullable();
            $table->tinyInteger('game_7')->nullable();
            $table->tinyInteger('game_8')->nullable();
            $table->tinyInteger('game_9')->nullable();
            $table->tinyInteger('game_10')->nullable();
            $table->tinyInteger('game_11')->nullable();
            $table->tinyInteger('game_12')->nullable();
            $table->tinyInteger('game_13')->nullable();
            $table->tinyInteger('game_14')->nullable();
            $table->tinyInteger('game_15')->nullable();
            $table->tinyInteger('game_16')->nullable();
            $table->tinyInteger('best_bet')->nullable();
            $table->tinyInteger('tiebreaker_points')->nullable();
            $table->timestamps();
            $table->index('week');
            $table->unique(['user_id', 'week']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
