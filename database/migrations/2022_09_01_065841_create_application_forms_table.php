<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->compact('Agent');
            $table->integer('agent_bonus');
            $table->integer('form_fee')->comment('Application form fee');
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('age')->nullable();
            $table->string('national_id_card_no_or_b_d_c')->nullable();
            $table->string('type_of_id')->nullable();
            $table->string('type_of_member')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('image')->nullable();
            $table->string('class')->nullable();
            $table->string('area')->nullable();

            $table->string('mobile_banking_number')->nullable();
            $table->string('mobile_banking_type')->nullable();
            $table->string('trx')->nullable();

            $table->text('village_present')->nullable();
            $table->text('village_permanent')->nullable();

            $table->text('post_office_present')->nullable();
            $table->text('post_office_permanent')->nullable();

            $table->text('thana_present')->nullable();
            $table->text('thana_permanent')->nullable();

            $table->text('district_present')->nullable();
            $table->text('district_permanent')->nullable();
            
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
        Schema::dropIfExists('application_forms');
    }
}
