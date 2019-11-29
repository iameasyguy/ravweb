<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes((['register' => false]));

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group( ['middleware' => ['auth']], function() {
    Route::resource('roles', 'RoleController');
    Route::resource('groups', 'GroupController');
    Route::resource('apollo', 'ApolloController');
    Route::resource('seshats', 'SeshatController');
    Route::resource('users', 'UserController');
    Route::resource('zalmos', 'ZalmoController');
    Route::resource('gaias','GaiaController');
    Route::resource('africas','AfricaController');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('export', 'ZalmoController@export')->name('export');
    Route::get('download', 'ZalmoController@getDownload')->name('download');
    Route::post('import', 'ZalmoController@import')->name('import');
    Route::post('bulkapollo', 'ApolloController@bulkupload')->name('bulkapollo');
    Route::get('bulkapollo', 'ApolloController@bulkview')->name('apolloview');
    Route::get('exportapollo', 'ApolloController@export')->name('apollexport');
    Route::get('sampleapollo', 'ApolloController@getDownload')->name('sampleapollo');
    Route::get('gexport', 'GaiaController@export')->name('gexport');
    Route::get('aexport', 'AfricaController@export')->name('aexport');
    Route::get('sampleafrica', 'AfricaController@getDownload')->name('sampleafrica');

    Route::post('apollo/send',['as'=>'apollo.send','uses'=>'ApolloController@send']);
    Route::delete('apollodel', 'ApolloController@deleteAll')->name('apollodel');
    Route::put('apolloval', 'ApolloController@validateAll')->name('apolloval');





    	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

//Route::group(['middleware' => 'auth'], function () {
////	Route::resource('user', 'UserController', ['except' => ['show']]);
//
//});


//Route::group(['middleware' => 'auth'], function () {

//});

