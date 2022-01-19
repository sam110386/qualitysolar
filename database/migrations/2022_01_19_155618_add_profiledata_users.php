<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfiledataUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyText('description')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('electrician_license')->nullable();
            $table->string('vehicle_insurance')->nullable();
            $table->string('liability_insurance')->nullable();
            $table->string('master_agreement')->nullable();
            $table->string('evcharger_certification')->nullable();
            $table->string('w9_certification')->nullable();
            $table->string('ein')->nullable();
            $table->string('poc')->nullable();
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
