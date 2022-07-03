<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('first_name', 50);
            $table->string('last_name', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('father_name', 100);
            $table->string('mother_name', 100);
            $table->string('present_address', 150);
            $table->string('permanent_address', 150);
            $table->string('education');
            $table->string('phone', 12);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
