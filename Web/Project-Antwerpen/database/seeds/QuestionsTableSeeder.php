<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
        	'questionbody' => 'Antwerpen is een stad',
        	'correctanswer' => true,
    	]);

        DB::table('questions')->insert([
        	'questionbody' => 'De Seine loopt door Antwerpen',
        	'correctanswer' => false,
    	]);

    	DB::table('questions')->insert([
        	'questionbody' => 'De Brandenburger Tor bevindt zich in Antwerpen',
        	'correctanswer' => false,
    	]);

    	DB::table('questions')->insert([
        	'questionbody' => 'Antwerpen telt ongeveer een half milioen inwoners.',
        	'correctanswer' => true,
    	]);

    }
}
