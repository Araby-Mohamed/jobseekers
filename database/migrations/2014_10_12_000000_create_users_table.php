<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('image')->nullable();
            $table->string('birthday')->nullable();
            $table->enum('gander',['Male','Female']);
            $table->enum('level', ['candidate', 'employer'])->default('candidate');
            $table->string('player_id')->nullable();
            $table->string('api_token')->nullable();
            $table->integer('accept');
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
