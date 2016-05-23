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
        	// 'project_link' => 'http://project-antwerpen.local/insertprojecthere',
            'project_id' => 1,
    	]);

    	DB::table('opinion_questions')->insert([
        	'opinionquestionbody' => 'Vind je dat de kathedraal aan renovatie toe is?',
        	// 'project_link' => 'http://project-antwerpen.local/insertprojecthere',
            'project_id' => 3,
    	]);

    	DB::table('opinion_questions')->insert([
        	'opinionquestionbody' => 'Vind je dat het MAS aan vernieuwing toe is?',
        	// 'project_link' => 'http://project-antwerpen.local/insertprojecthere',
            'project_id' => 2,
    	]);
    }
}
