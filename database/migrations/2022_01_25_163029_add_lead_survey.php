<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLeadSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lead_id')->index();
            $table->string('customer_name', 60)->nullable();
            $table->string('address')->nullable();
            $table->string('permit_no', 50)->nullable();
            $table->date('inspection_date')->nullable();
            $table->tinyInteger('inspection_completed')->unsigned()->default(0)->index();
            $table->string('inspector_name', 60)->nullable();
            $table->tinyInteger('charger_completion_of_installation')->comment('Was the EV charger functioning at the completion of installation?')->default(0);
            $table->tinyInteger('how_use_charger')->comment('Did the Vehya rep show you how to use the EV charger?')->default(0);
            $table->tinyInteger('demonstrate_charger')->comment('Was there a vehicle to demonstrate the EV charger?')->default(0);
            $table->tinyInteger('interested_service_contract')->comment('Are you interested in a service contract for your EV charger(s)?')->default(0);
            $table->string('surveyed_name', 60)->nullable();
            $table->string('phone', 60)->nullable()->comment('Phone Number');
            $table->string('email', 60)->nullable()->comment('Email address');
            $table->text('detail')->nullable()->comment('Description');
            $table->string('charger_installed_image', 60)->nullable()->comment('pic of charger installed');
            $table->string('electrical_panel_image', 60)->nullable()->comment('pic of electrical panel');
            $table->string('exterior_property_image', 60)->nullable()->comment('1 front exterior of property');
            $table->string('permit_image', 60)->nullable()->comment('pic of permit');
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
        //
    }
}
