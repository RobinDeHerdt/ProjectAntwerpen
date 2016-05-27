<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpinonQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinion_questions', function (Blueprint $table) {
            $table->increments('opinionquestion_id');
            $table->string('opinionquestionbody');
            $table->integer('up_vote');
            $table->integer('down_vote');
        });

         Schema::table('opinion_questions', function($table) {
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votes');
        Schema::drop('opinion_questions');
    }
}
