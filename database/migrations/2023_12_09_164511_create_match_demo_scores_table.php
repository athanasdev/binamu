<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchDemoScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_demo_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('match_id');
            $table->string('demo_score');
            $table->decimal('percentage', 10, 2);
            $table->integer('is_profitable');
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
        Schema::dropIfExists('match_demo_scores');
    }
}
