<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PageController@welcome');
Route::get('register', 'PageController@register');
Route::get('login', 'PageController@login');
Route::get('nieuwproject', 'AdminController@template');
Route::get('home', 'PageController@home');
Route::get('json', 'ApiController@getQuestions');
Route::get('profiel', 'HomeController@dashboard');
Route::get('/overzicht', 'PageController@overview');
Route::get('/project/{id}/tijdlijn', 'ProjectController@tijdlijn');
Route::get('/project/{id}/reacties', 'ProjectController@reacties');
Route::get('/project/{id}/info', 'ProjectController@info');
Route::get('/project/{id}/kaart', 'ProjectController@kaart');
Route::get('/project/{id}/meningen', 'ProjectController@meningen');

Route::post('/nieuwproject', 'ProjectController@store');
Route::auth();