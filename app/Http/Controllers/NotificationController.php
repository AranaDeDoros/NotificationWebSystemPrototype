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
    	return back()->with('notification', $notification);

    }
}
