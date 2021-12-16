<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedInteger('lead_id')->nullable();

            $table->foreign('lead_id', 'lead_fk_583774')->references('id')->on('leads');

            $table->unsignedInteger('user_id')->nullable();

            $table->foreign('user_id', 'user_fk_583777')->references('id')->on('users');
        });
    }
}
