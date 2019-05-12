<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('year');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('jan');
            $table->tinyInteger('feb');
            $table->tinyInteger('mar');
            $table->tinyInteger('apr');
            $table->tinyInteger('may');
            $table->tinyInteger('jun');
            $table->tinyInteger('jul');
            $table->tinyInteger('ago');
            $table->tinyInteger('sep');
            $table->tinyInteger('oct');
            $table->tinyInteger('nov');
            $table->tinyInteger('dec');
            $table->integer('total');
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
        Schema::dropIfExists('incomes');
    }
}
