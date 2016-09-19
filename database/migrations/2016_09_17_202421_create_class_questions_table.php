<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->integer('id_class');
            $table->string('status');
            $table->string('correct_response');
            $table->string('wrong_response1')->nullable();
            $table->string('wrong_response2')->nullable();
            $table->string('wrong_response3')->nullable();
            $table->integer('user');
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
        //
    }
}
