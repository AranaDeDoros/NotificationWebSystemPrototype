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
    return view('test');
});

//Auth::routes();

Route::group(['prefix' => 'groups'], function () {
    Route::get('/all', 'GroupController@index')->name('groups.all');
    Route::get('/view', 'GroupController@view')->name('groups.view');
    Route::post('/new', 'GroupController@new')->name('groups.new');
});


Route::group(['prefix' => 'users'], function(){
	Route::get('/all', 'UserController@index')->name('users.all');
	Route::get('/view', 'UserController@index')->name('users.view');
	Route::post('/new', 'UserController@new')->name('users.new');	
});

Route::group(['prefix' => 'notifications'], function(){
	Route::get('/all', 'NotificationController@index')->name('notifications.all');	
	Route::get('/view', 'NotificationController@index')->name('notifications.view');
	Route::post('/new', 'NotificationController@new')->name('notifications.new');
});




Route::get('/home', 'HomeController@index')->name('home');
