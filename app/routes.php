<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::model('persons', 'Person');
Route::model('scouts', 'Scout');
Route::model('adults', 'Adult');

Route::get('persons/login', array('as' => 'login', 'uses' => 'PersonsController@login'));
Route::get('persons/show/{persons}', array('as' => 'profile', 'uses' => 'PersonsController@show'));
Route::get('scouts/court-of-honor', array('as' => 'court-of-honor', 'uses' => 'ScoutsController@coh'));
Route::get('scouts/search', array('as' => 'search', 'uses' => 'ScoutsController@search'));

Route::resource('persons', 'PersonsController');
Route::resource('scouts', 'ScoutsController');
Route::resource('adults', 'AdultsController');
