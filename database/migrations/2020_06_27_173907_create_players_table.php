<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->unsignedBigInteger('team_id');
           // $table->foreign('team_id')->references('id')->on('teams');
            $table->string('logo');
            $table->string('jersey')->unique();
            $table->unsignedBigInteger('matchplayed');
            $table->unsignedBigInteger('total_runs');
            $table->unsignedBigInteger('high_score');
            $table->unsignedBigInteger('total_fifty');
            $table->unsignedBigInteger('total_hundreds');
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
        Schema::dropIfExists('players');
    }
}
