<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->insert([
        	'vote' => true,
        	'user_id' => 1,
    	]);

    	DB::table('votes')->insert([
        	'vote' => false,
        	'user_id' => 2,
    	]);

    	DB::table('votes')->insert([
        	'vote' => true,
        	'user_id' => 3,
    	]);
    }
}
