<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('ratings')->insert([
        	'rating' => 4,
        	'user_id' => 1,
        	'project_id' => 1,
    	]);

    	DB::table('ratings')->insert([
        	'rating' => 5,
        	'user_id' => 2,
        	'project_id' => 1,
    	]);

    	DB::table('ratings')->insert([
        	'rating' => 5,
        	'user_id' => 3,
        	'project_id' => 1,
    	]);
    }
}
