<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('phone',16)->nullable();
            $table->string('email')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('ev_charger_type')->nullable();
            $table->string('expected_install_days')->nullable();
            $table->string('industry')->nullable();
            $table->longText('questions')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
