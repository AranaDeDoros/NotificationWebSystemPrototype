<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function index(){
    	$notifications = Notification::all();
    	return view('notifications/all')->with('notifications', $notifications);
    }

    public function view(Request $request){
    	$id = $request->query('id');
    	$notification = Notification::find($id);
    	return view('notifications/all')->with('notification', $notification);

    }

    public function new(Request $request){
    	////////
    }

    public function update(Request $request){
        
    }

    public function delete($id){
    	return Notification::find($id)->delete();
    }
}
