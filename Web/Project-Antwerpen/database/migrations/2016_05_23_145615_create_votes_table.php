<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('vote_id');
            $table->boolean('vote');
        });   

         Schema::table('votes', function($table) {
            $table->integer('user_id')->unsigned();
            // $table->integer('project_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
