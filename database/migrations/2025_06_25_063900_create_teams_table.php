<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->enum('prefix', ['Mr', 'Mrs', 'Miss', 'Ms', 'Mx', 'Sir', 'Dr', 'Lady', 'Lord'])->default('Mr');
            $table->enum('member_type', ['core', 'fellow'])->default('core');
            $table->string('name');
            $table->string('designation');
            $table->string('expertise')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('profile_url')->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('teams');
    }
}
