<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('city', 25);
            $table->string('abbreviation', 5);
            $table->string('division', 10);
            $table->tinyInteger('wins')->default(0);
            $table->tinyInteger('losses')->default(0);
            $table->tinyInteger('ties')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
