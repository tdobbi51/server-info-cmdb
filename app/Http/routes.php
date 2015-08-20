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

// Index page
Route::get('/', 'MainController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Authentication is required for these routes
Route::group(['middleware' => 'auth'], function() 
{
	// Main application routes
	Route::resource('hosts', 'HostController');
	Route::resource('environments', 'EnvironmentController');
	Route::resource('businesses', 'BusinessController');
	Route::resource('applications', 'ApplicationController');
	Route::resource('devteams', 'DevteamController');
	Route::resource('interfaces', 'InterfaceController');
	Route::resource('users', 'UserController', ['only' => ['index']]);
	Route::resource('profile', 'ProfileController', ['only' => ['index', 'update', 'edit', 'destroy']]);

	// Datatable routes to pull table data
	Route::get('datatable/hosts', 'HostController@datatable');
	Route::get('datatable/applications', 'ApplicationController@datatable');
	Route::get('datatable/businesses', 'BusinessController@datatable');
	Route::get('datatable/devteams', 'DevteamController@datatable');
	Route::get('datatable/ipinterfaces', 'IPinterfacesController@datatable');

	// Excel import/export routes
	Route::get('excel/export/hosts', 'ExcelController@exportHosts');

});




