<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_question', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('tests')->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('test_question');
    }
}
