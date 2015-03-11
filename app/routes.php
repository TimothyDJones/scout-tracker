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

Route::model('scouts', 'Scout');
Route::model('adults', 'Adults');

Route::get('scouts/court-of-honor', array('as' => 'court-of-honor', 'uses' => 'ScoutsController@coh'));
Route::get('scouts/search', array('as' => 'search', 'uses' => 'ScoutsController@search'));

Route::resource('scouts', 'ScoutsController');
Route::resource('adults', 'AdultsController');
