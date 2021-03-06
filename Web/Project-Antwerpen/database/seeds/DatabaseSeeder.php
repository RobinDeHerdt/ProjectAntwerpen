<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
    	$this->call(ProjectsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(OpinionQuestionsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(MilestonesTableSeeder::class);
    }
}
