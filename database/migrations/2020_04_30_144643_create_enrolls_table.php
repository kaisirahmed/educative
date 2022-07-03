<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBigInteger('track_topic_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('current_lesson')->nullable();
            $table->bigInteger('percent_completion')->nullable();
            $table->string('coupon_code')->nullable();
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
        Schema::dropIfExists('enrolls');
    }
}
