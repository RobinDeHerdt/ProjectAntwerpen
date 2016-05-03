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
    	// 1
        DB::table('projects')->insert([
        	'project_name' => 'Nieuwe sporen centraal station',
        	'headerimage' => '/img/station.jpg',
        	'info' => 'Er komen 3 nieuwe sporen in het centraal station',
        	'location' => 'Antwerpen',
        	'postalcode' => '2000',
        	'xcoord' => 51.216949,
        	'ycoord' => 4.421207,
        	'thema' => 'Mobiliteit',
        	'start_date' => '2016-04-10',
        	'end_date' => '2016-07-23',
        	'color' => 'red',
    	]);
        // 2
    	DB::table('projects')->insert([
        	'project_name' => 'Vernieuwing MAS',
        	'headerimage' => '/img/mas.jpg',
        	'info' => 'Het Museum aan de Stroom zal vernieuwd worden.',
        	'location' => 'Antwerpen',
        	'postalcode' => '2000',
        	'xcoord' => 51.2289238,
        	'ycoord' => 4.4026263,
        	'thema' => 'Architectuur',
        	'start_date' => '2016-06-21',
        	'end_date' => '2016-12-04',
        	'color' => 'orange',
    	]);
    	// 3
    	DB::table('projects')->insert([
        	'project_name' => 'Restauratie kathedraal',
        	'headerimage' => '/img/kathedraal.jpg',
        	'info' => 'De kathedraal zal gerestaureerd worden.',
        	'location' => 'Antwerpen',
        	'postalcode' => '2000',
        	'xcoord' => 51.2240454,
        	'ycoord' => 4.3982035,
        	'thema' => 'Architectuur',
        	'start_date' => '2017-01-14',
        	'end_date' => '2017-05-03',
        	'color' => 'purple',
    	]);
    	// 5
    	DB::table('projects')->insert([
        	'project_name' => 'Rondleidingen Antwerpen',
        	'headerimage' => '/img/steen.jpg',
        	'info' => 'Er worden nieuwe rondleidingen georganiseerd in Antwerpen.',
        	'location' => 'Antwerpen',
        	'postalcode' => '2000',
        	'xcoord' => 51.2603015,
        	'ycoord' => 4.2176376,
        	'thema' => 'Toerisme',
        	'start_date' => '2017-06-02',
        	'end_date' => '2017-06-16',
        	'color' => 'blue',
    	]);
    	// 4
    	DB::table('projects')->insert([
        	'project_name' => 'Aanleg sportpark',
        	'headerimage' => '/img/sportpark.jpg',
        	'info' => 'Er komt een nieuw sportpark in Deurne.',
        	'location' => 'Antwerpen',
        	'postalcode' => '2000',
        	'xcoord' => 51.2240454,
        	'ycoord' => 4.3982035,
        	'thema' => 'Sport',
        	'start_date' => '2017-05-04',
        	'end_date' => '2017-06-16',
        	'color' => 'green',
    	]);
    }
}
