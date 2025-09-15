<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentBonusHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_bonus_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('Agent');
            $table->integer('application_form_id');
            $table->double('bonus', 10,2);
            $table->integer('form_fee');
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
        Schema::dropIfExists('agent_bonus_histories');
    }
}
