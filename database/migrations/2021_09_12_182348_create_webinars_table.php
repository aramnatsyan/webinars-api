<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('title_id');
            $table->foreign('title_id')->references('id')->on('webinar_titles');
            $table->unsignedBigInteger('theme_id');
            $table->foreign('theme_id')->references('id')->on('theme_of_webinars');
            $table->dateTime('estimated_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinars');
    }
}
