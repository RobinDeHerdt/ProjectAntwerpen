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
        	'milestone_image' => '/img/cd-icon-picture.svg',
        	'milestone_info' => 'De uitgravingen vinden nu plaats.',
        	'start_date' => '2016-04-20',
        	'end_date' => '2016-05-29',
        	'project_id' => 1,
    	]);

    	DB::table('milestones')->insert([
        	'milestone_title' => 'Spoor leggen',
        	'milestone_image' => '/img/cd-icon-movie.svg',
        	'milestone_info' => 'Sporen worden aangelegd.',
        	'start_date' => '2016-05-30',
        	'end_date' => '2016-07-05',
        	'project_id' => 1,
    	]);

    	DB::table('milestones')->insert([
        	'milestone_title' => 'Voltooien',
        	'milestone_image' => '/img/cd-icon-location.svg',
        	'milestone_info' => 'Ruimte klaarmaken voor het publiek.',
        	'start_date' => '2016-07-06',
        	'end_date' => '2016-07-23',
        	'project_id' => 1,
    	]);

        DB::table('milestones')->insert([
            'milestone_title' => 'Stellingen plaatsen',
            'milestone_image' => '/img/cd-icon-picture.svg',
            'milestone_info' => 'Rond de kathedraal worden stellingen gebouwd om de restauratie voor te bereiden.',
            'start_date' => '2016-08-20',
            'end_date' => '2016-09-29',
            'project_id' => 3,
        ]);

        DB::table('milestones')->insert([
            'milestone_title' => 'Restauratiewerken',
            'milestone_image' => '/img/cd-icon-movie.svg',
            'milestone_info' => 'Restauratie',
            'start_date' => '2016-09-30',
            'end_date' => '2017-05-10',
            'project_id' => 3,
        ]);

        DB::table('milestones')->insert([
            'milestone_title' => 'Afwerken',
            'milestone_image' => '/img/cd-icon-movie.svg',
            'milestone_info' => 'Restauratie afronden en stellingen afbreken.',
            'start_date' => '2017-06-01',
            'end_date' => '2017-06-12',
            'project_id' => 3,
        ]);

        DB::table('milestones')->insert([
            'milestone_title' => 'MAS',
            'milestone_image' => '/img/cd-icon-movie.svg',
            'milestone_info' => 'Museum aan de stroom',
            'start_date' => '2017-06-01',
            'end_date' => '2018-05-12',
            'project_id' => 2,
        ]);

        DB::table('milestones')->insert([
            'milestone_title' => 'Rondleidingen',
            'milestone_image' => '/img/cd-icon-movie.svg',
            'milestone_info' => '...',
            'start_date' => '2017-06-01',
            'end_date' => '2018-05-12',
            'project_id' => 4,
        ]);

        DB::table('milestones')->insert([
            'milestone_title' => 'Sportpark',
            'milestone_image' => '/img/cd-icon-movie.svg',
            'milestone_info' => '...',
            'start_date' => '2017-06-01',
            'end_date' => '2018-05-12',
            'project_id' => 4,
        ]);
    }
}
            
            
