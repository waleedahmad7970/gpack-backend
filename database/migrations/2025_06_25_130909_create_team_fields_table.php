<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_fields', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->unsignedBigInteger('field_id')->nullable();

            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('field_id')->references('id')->on('fields');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_fields');
    }
}
