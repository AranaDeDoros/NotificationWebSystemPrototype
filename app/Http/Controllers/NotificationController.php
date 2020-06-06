<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Repositories\NotificationRepositoryInterface;

class NotificationController extends Controller
{

    private $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository){
        $this->notificationRepository = $notificationRepository;
    }

    public function index(){
    	$notifications = Notification::all();
    	return view('notifications/all')->with('notifications', $notifications);
    }

    public function view(Request $request){
        $id = $request->query('id');
    	$notification = Notification::find($id);
    	return view('notifications/view')->with('notification', $notification);

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
