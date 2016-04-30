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
Route::get('about', 'PageController@about');

Route::get('register', 'PageController@register');
Route::get('login', 'PageController@login');
Route::get('template', 'PageController@template');
Route::get('home', 'PageController@home');
Route::get('uitleg', 'PageController@uitleg');
Route::get('map', 'PageController@map');
Route::get('stemmen', 'PageController@stemmen');
Route::get('tijdlijn', 'PageController@tijdlijn');
Route::get('comments', 'PageController@comments');



// Route::get('')
Route::get('profile', 'HomeController@dashboard');
Route::auth();
//Route::get('/home', 'HomeController@index');
Route::get('/overview', 'PageController@overview');

