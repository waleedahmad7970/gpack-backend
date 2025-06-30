<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_pages', function (Blueprint $table) {
            $table->id();
            $table->string('ceo_name')->nullable();
            $table->text('ceo_message')->nullable();
            $table->string('ceo_image_url')->nullable();
            $table->string('team_member_ids')->nullable();
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
        Schema::dropIfExists('why_pages');
    }
}
