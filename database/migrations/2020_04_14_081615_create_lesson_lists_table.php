<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_lists', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBigInteger('lesson_id');
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->integer('order_number');
            $table->boolean('preview');
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
        Schema::dropIfExists('lesson_lists');
    }
}
