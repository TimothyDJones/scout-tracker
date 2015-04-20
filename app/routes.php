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
Route::model('addresses', 'Address');
Route::model('awards', 'Award');
Route::model('ranks', 'Rank');

Route::get('login', array('as' => 'login', 'uses' => 'PersonsController@login'))->before('guest');
Route::get('persons/login', array('as' => 'login', 'uses' => 'PersonsController@login'))->before('guest');
Route::post('persons/authenticate', array('as' => 'authenticate', 'uses' => 'PersonsController@authenticate'));
Route::get('profile/{persons?}', array('as' => 'profile', 'uses' => 'PersonsController@show'));
Route::get('persons/show/{persons?}', array('as' => 'profile', 'uses' => 'PersonsController@show'));
Route::get('persons/changePassword/{persons?}', array('as' => 'changePassword', 'uses' => 'PersonsController@changePassword'))->before('auth');
Route::post('persons/updatePassword/{persons}', array('as' => 'updatePassword', 'uses' => 'PersonsController@updatePassword'))->before('auth');
Route::get('scouts/court-of-honor', array('as' => 'court-of-honor', 'uses' => 'ScoutsController@coh'));
Route::get('scouts/search', array('as' => 'search', 'uses' => 'ScoutsController@search'));
Route::post('scouts/{persons}/rank/{ranks}', array('as' => 'scout-rank-update', 'uses' => 'ScoutsController@update'));

Route::resource('persons', 'PersonsController');
Route::resource('scouts', 'ScoutsController');
Route::resource('adults', 'AdultsController');
Route::resource('addresses', 'AddressesController');
Route::resource('awards', 'AwardsController');
Route::resource('ranks', 'RanksController');
