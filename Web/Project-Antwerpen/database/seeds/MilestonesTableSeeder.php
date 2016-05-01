<?php

use Illuminate\Database\Seeder;

class MilestonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('milestones')->insert([
        	'milestone_title' => 'Uitgravingen',
        	'milestone_image' => '../img/station.jpg',
        	'milestone_info' => 'De uitgravingen vinden nu plaats.',
        	'start_date' => '2016-04-20',
        	'end_date' => '2016-05-29',
        	'project_id' => 1,
    	]);

    	DB::table('milestones')->insert([
        	'milestone_title' => 'Spoor leggen',
        	'milestone_image' => '../img/station.jpg',
        	'milestone_info' => 'Sporen worden aangelegd.',
        	'start_date' => '2016-05-30',
        	'end_date' => '2016-07-05',
        	'project_id' => 1,
    	]);

    	DB::table('milestones')->insert([
        	'milestone_title' => 'Voltooien',
        	'milestone_image' => '../img/station.jpg',
        	'milestone_info' => 'Ruimte klaarmaken voor het publiek.',
        	'start_date' => '2016-07-06',
        	'end_date' => '2016-07-23',
        	'project_id' => 1,
    	]);
    }
}
