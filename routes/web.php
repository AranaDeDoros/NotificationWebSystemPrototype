<?php

use Illuminate\Support\Facades\Route;
use App\Utilities\NotificationLogger;
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

Route::get('algo', function(){
	$level = 'alert'; $event = 1; $msg = "dsds"; $by = 'me';
	dump($level, $event, $msg, $by);
	$log = new NotificationLogger('notificationsys');
return //\Log::emergency($msg);
$log->writeToLog($level, $event, $msg, $by);
return \DB::select(DB::raw('select * from failed_jobs'));
return \App\Mail\EmailManager::getUserEmailAddressesRAW(1);

});

Route::get('/', function () {
    return view('test');
})->name('index');

Auth::routes();


/*Route::middleware('auth')->group(function(){
	Route::group(['prefix' => 'admin'], function(){
		Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs');
	});
});*/


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
	return '<h1 style="text-align:center; font-size:300px">¯\_(ツ)_/¯</h1>';
});