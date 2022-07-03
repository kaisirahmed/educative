<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_topics', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('image');
            $table->string('title', 100);
            $table->string('slug', 100);
            $table->enum('course_type', ['track','topic']);
            $table->text('short_description');
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
        Schema::dropIfExists('track_topics');
    }
}
