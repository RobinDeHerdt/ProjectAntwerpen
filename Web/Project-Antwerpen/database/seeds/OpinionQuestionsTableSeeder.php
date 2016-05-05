<?php

use Illuminate\Database\Seeder;

class OpinionQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opinion_questions')->insert([
        	'opinionquestionbody' => 'Vind je dat het centraal station in Antwerpen meer sporen nodig heeft?',
        	'project_link' => 'http://project-antwerpen.local/insertprojecthere',
    	]);

    	DB::table('opinion_questions')->insert([
        	'opinionquestionbody' => 'Vind je dat de kathedraal aan renovatie toe is?',
        	'project_link' => 'http://project-antwerpen.local/insertprojecthere',
    	]);

    	DB::table('opinion_questions')->insert([
        	'opinionquestionbody' => 'Vind je dat er extra parkeerplaatsen moeten komen aan de kaaien?',
        	'project_link' => 'http://project-antwerpen.local/insertprojecthere',
    	]);
    }
}
