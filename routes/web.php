<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware('throttle:20,1')->group(function () {
Route::group(['prefix' => 'groups'], function () {
    Route::get('/all', 'GroupController@index')->name('groups.all');
    Route::get('/view/{id}', 'GroupController@view')->name('groups.view');
    Route::post('/new', 'GroupController@new')->name('groups.new');
    Route::put('/update', 'GroupController@update')->name('groups.update');
    Route::delete('/remove/{id}', 'GroupController@delete')->name('groups.delete');
});
});

Route::middleware('throttle:20,1')->group(function () {
Route::group(['prefix' => 'users'], function(){
	Route::get('/all', 'UserController@index')->name('users.all');
	Route::get('/view/{id}', 'UserController@view')->name('users.view');
	Route::post('/new', 'UserController@new')->name('users.new');
	Route::put('/update', 'UserController@update')->name('users.update');
	Route::delete('/remove/{id}', 'UserController@delete')->name('users.delete');	
});
});

Route::middleware('throttle:20,1')->group(function () {
Route::group(['prefix' => 'notifications'], function(){
	Route::get('/all', 'NotificationController@index')->name('notifications.all');	
	Route::get('/view/{id}', 'NotificationController@view')->name('notifications.view');
	Route::post('/new', 'NotificationController@new')->name('notifications.new');
	Route::put('/update', 'NotificationController@update')->name('notifications.update');
	Route::delete('/remove/{id}', 'NotificationController@delete')->name('notifications.delete');
	});
});

Route::middleware('throttle:20,1')->group(function(){
	Route::group(['prefix' => 'search'], function(){
		Route::get('/users', 'UserController@searchUsers')->name('search.users');
		Route::get('/groups', 'GroupController@searchGroups')->name('search.groups');
	});
});


Route::get('/home', 'HomeController@index')->name('home');

Route::fallback(function () {
	return 'nobody here but us chickens!';
});