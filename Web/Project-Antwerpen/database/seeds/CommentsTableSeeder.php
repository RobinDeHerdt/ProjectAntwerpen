<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
        	'comment_body' => 'Join the dark side!',
        	'user_id' => 1,
        	'project_id' => 1,
            'rating' => 4,
            'created_at' => '2016-07-06',
    	]);

        DB::table('comments')->insert([
            'comment_body' => 'Tof project',
            'user_id' => 1,
            'project_id' => 1,
            'rating' => 3,
            'created_at' => '2016-07-06',
        ]);

        DB::table('comments')->insert([
            'comment_body' => 'Ik ben niet zo tevreden met dit project.',
            'user_id' => 1,
            'project_id' => 2,
            'rating' => 1,
            'created_at' => '2016-07-06',
        ]);

    	DB::table('comments')->insert([
        	'comment_body' => 'Dit project is geweldig.',
        	'user_id' => 2,
        	'project_id' => 1,
            'rating' => 5,
            'created_at' => '2016-07-06',
    	]);

    	DB::table('comments')->insert([
        	'comment_body' => 'Cool project.',
        	'user_id' => 3,
        	'project_id' => 3,
            'rating' => 4,
            'created_at' => '2016-07-06',
    	]);

        DB::table('comments')->insert([
            'comment_body' => 'Dit project is geweldig.',
            'user_id' => 2,
            'project_id' => 2,
            'rating' => 5,
            'created_at' => '2016-07-06',
        ]);

        DB::table('comments')->insert([
            'comment_body' => 'Cool project.',
            'user_id' => 3,
            'project_id' => 4,
            'rating' => 5,
            'created_at' => '2016-07-06',
        ]);

        DB::table('comments')->insert([
            'comment_body' => 'Dit project is geweldig.',
            'user_id' => 2,
            'project_id' => 5,
            'rating' => 3,
            'created_at' => '2016-07-06',
        ]);

        DB::table('comments')->insert([
            'comment_body' => 'Cool project.',
            'user_id' => 3,
            'project_id' => 5,
            'rating' => 4,
            'created_at' => '2016-07-06',
        ]);
    }
}
