<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('projects')->insert([
        	'project_name' => 'Nieuwe sporen centraal station',
        	'headerimage' => '../img/station.jpg',
        	'info' => 'Er komen 3 nieuwe sporen in het centraal station',
        	'location' => 'Antwerpen',
        	'postalcode' => '2000',
        	'xcoord' => 51.216949,
        	'ycoord' => 4.421207,
        	'thema' => 'Mobiliteit',
        	'start_date' => '2016-04-10',
        	'end_date' => '2016-07-23',
        	'color' => 'purple',
    	]);

    	DB::table('projects')->insert([
        	'project_name' => 'Vernieuwing MAS',
        	'headerimage' => '../img/mas.jpg',
        	'info' => 'Het Museum aan de Stroom zal vernieuwd worden.',
        	'location' => 'Antwerpen',
        	'postalcode' => '2000',
        	'xcoord' => 51.216949,
        	'ycoord' => 4.421207,
        	'thema' => 'Architectuur',
        	'start_date' => '2016-06-21',
        	'end_date' => '2016-12-',
        	'color' => 'yellow',
    	]);
    }
}

