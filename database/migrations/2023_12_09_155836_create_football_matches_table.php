<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootballMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_matches', function (Blueprint $table) {
            $table->id();
            $table->integer('league_id');
            $table->string('part');
            $table->string('title');
            $table->string('team_one');
            $table->string('team_one_logo');
            $table->string('team_two');
            $table->string('team_two_logo');
            $table->string('match_start')->nullable();
            $table->string('betting_start')->nullable();
            $table->string('betting_end')->nullable();
            $table->string('profite')->nullable();
            $table->string('wining_score')->nullable();
            $table->string('demo_volume')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('football_matches');
    }
}
