<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
	{
    	DB::table('users')->insert([
        	'firstname' => 'Anakin',
        	'lastname' => 'Skywalker',
        	'age' => 34,
        	'gender_1male_2female' => 1,
        	'postalcode' => 2220,
        	'email' => 'anakinskywalker@gmail.com',
        	'password' => bcrypt('darthvader'),
    	]);

    	DB::table('users')->insert([
        	'firstname' => 'Robin',
        	'lastname' => 'De Herdt',
        	'age' => 20,
        	'gender_1male_2female' => 1,
        	'postalcode' => 2220,
        	'email' => 'rdh_robin@gmail.com',
        	'password' => bcrypt('123456'),
    	]);

    	DB::table('users')->insert([
        	'firstname' => 'Natalie',
        	'lastname' => 'Portman',
        	'age' => 34,
        	'gender_1male_2female' => 2,
        	'postalcode' => 2220,
        	'email' => 'natalieportman@gmail.com',
        	'password' => bcrypt('123456'),
    	]);
	}
    
}
