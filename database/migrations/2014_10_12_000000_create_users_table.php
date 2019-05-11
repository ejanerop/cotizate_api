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
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->ipAddress('ip_address');
            $table->unsignedBigInteger('access_nano_id');
            $table->unsignedBigInteger('user_nano_id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('access_nano_id')->references('id')->on('access_nanos');
            $table->foreign('user_nano_id')->references('id')->on('user_nanos');
            $table->foreign('role_id')->references('id')->on('roles');
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
