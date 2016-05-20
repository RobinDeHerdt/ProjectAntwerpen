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


// Page requests
Route::get('/', 'PageController@welcome');
Route::get('/register', 'PageController@register');
Route::get('/login', 'PageController@login');
Route::get('/nieuwproject', 'AdminController@newproject');
Route::get('/bewerkproject/{id}', 'AdminController@editproject');
Route::get('/kopiërenproject/{id}', 'AdminController@copyproject');
Route::get('/verwijderproject/{id}', 'AdminController@deletepage');
Route::get('/home', 'PageController@home');
Route::get('/overzicht', 'PageController@overview');
Route::get('/project/{id}/tijdlijn', 'ProjectController@tijdlijn');
Route::get('/project/{id}/reacties', 'CommentController@reacties');
Route::get('/project/{id}/info', 'ProjectController@info');
Route::get('/project/{id}/kaart', 'ProjectController@kaart');
Route::get('/project/{id}/meningen', 'ProjectController@meningen');

// Api requests
Route::get('questions_json', 'ApiController@getQuestions');
Route::get('opinionquestions_json', 'ApiController@getOpinionQuestions');

// Post requests
Route::post('/nieuwproject', 'AdminController@store');
Route::post('/bewerkproject/{id}', 'AdminController@update');
Route::post('/verwijderproject/{id}', 'AdminController@deleteproject');
Route::post('/kopiërenproject/{id}', 'AdminController@copy');
Route::post('/project/{id}/reacties', 'CommentController@store');

// Delete requests
Route::post('/project/{id}/reacties/{comment}', 'CommentController@delete');

Route::auth();
