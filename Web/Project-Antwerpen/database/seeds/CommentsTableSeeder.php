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
    	]);

        DB::table('comments')->insert([
            'comment_body' => 'Lel',
            'user_id' => 1,
            'project_id' => 1,
        ]);

        DB::table('comments')->insert([
            'comment_body' => 'Lol',
            'user_id' => 1,
            'project_id' => 2,
        ]);

    	DB::table('comments')->insert([
        	'comment_body' => 'Dees project is awesome.',
        	'user_id' => 2,
        	'project_id' => 1,
    	]);

    	DB::table('comments')->insert([
        	'comment_body' => 'Cool project.',
        	'user_id' => 3,
        	'project_id' => 3,
    	]);

        DB::table('comments')->insert([
            'comment_body' => 'Dees project is awesome.',
            'user_id' => 2,
            'project_id' => 2,
        ]);

        DB::table('comments')->insert([
            'comment_body' => 'Cool project.',
            'user_id' => 3,
            'project_id' => 4,
        ]);

        DB::table('comments')->insert([
            'comment_body' => 'Dees project is awesome.',
            'user_id' => 2,
            'project_id' => 5,
        ]);

        DB::table('comments')->insert([
            'comment_body' => 'Cool project.',
            'user_id' => 3,
            'project_id' => 5,
        ]);
    }
}
