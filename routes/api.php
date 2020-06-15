<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/groupTypes', function(Request $request){
	return \App\GroupType::all(); 
});

Route::get('schedules', function(Request $request){
	return \App\Schedule::all(); 
});

Route::get('/notif', function(Request $request){
	return \App\Notification::all(); 
});

Route::get('/groups', function(Request $request){
	return \App\Group::all(); 
});

Route::get('/users', function(Request $request){
	return \App\User::all(); 
});

Route::get('/notifTypes', function(Request $request){
	return \App\NotificationType::all(); 
});
