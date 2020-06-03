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
}
