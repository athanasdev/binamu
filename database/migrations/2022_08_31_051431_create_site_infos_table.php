<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->text('site_name')->nullable();
            $table->text('foundation_name')->nullable();
            $table->text('slogan')->nullable();
            $table->text('contact_number')->nullable();
            $table->text('email')->nullable();
            $table->text('profit')->nullable();
            $table->integer('agent_fee')->nullable();
            $table->integer('form_fee')->nullable();
            $table->integer('refer_commission')->nullable();
            $table->integer('min_withdraw')->nullable();
            $table->text('address')->nullable();
            $table->text('facebook')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('youtube')->nullable();
            $table->text('insta')->nullable();
            $table->text('linkedin')->nullable();
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
        Schema::dropIfExists('site_infos');
    }
}
