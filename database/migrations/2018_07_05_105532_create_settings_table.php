<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->tinyInteger('current_week')->default(0);
            $table->timestamp('registration_deadline');
            $table->tinyInteger('number_of_weeks');
            $table->tinyInteger('cost_per_week');
            $table->tinyInteger('total_cost');
            $table->tinyInteger('towards_weekly');
            $table->tinyInteger('towards_overall');
            $table->tinyInteger('overall_1st_percent');
            $table->tinyInteger('overall_2nd_percent');
            $table->tinyInteger('overall_3rd_percent');
            $table->tinyInteger('win_points');
            $table->tinyInteger('loss_points');
            $table->tinyInteger('tie_points');
            $table->tinyInteger('best_bet_win_points');
            $table->tinyInteger('best_bet_tie_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
