<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('title');
            $table->longText('content');
            $table->integer('user');
            $table->integer('course_id')->unsigned();;
            $table->timestamps();
        });

        Schema::table('class', function($table) {
            $table->foreign('course_id')->references('id')->on('course');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('class');
    }
}
