<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Repositories\NotificationRepositoryInterface;

class NotificationController extends Controller
{

    private $notificationRepository;
    const NOTIFICATION_INACTIVE = 0;

    public function __construct(NotificationRepositoryInterface $notificationRepository){
        $this->notificationRepository = $notificationRepository;
    }

    public function index(){
    	$notifications = $this->notificationRepository->all();
        return view('notifications/all')->with('notifications', $notifications);
    }

    public function view($id){

        $notification = $this->notificationRepository->findById($id);
        return view('notifications/view')->with('notification', $notification);

    }

    public function new(Request $request){

        $keys = $request->all();
        $isUnique = $this->notificationRepository->new($keys);

/*        if($isUnique == false){
            return back()->with('sOperation', 'nErr');
        }*/

        return back()->with('sOperation', 'nSuc');

    }

    public function update(Request $request){

        $keys = $request->all();
        $notificationRespo = $this->notificationRepository->update($keys);

        if($notificationRespo == self::NOTIFICATION_INACTIVE){
            return redirect('notifications/all');
        }
        
        if ($notificationRespo == -1) {
            return back()->with('sOperation', 'uErr');
        }

        return back()->with('sOperation', 'uSuc');
    }

    public function delete($id){

        $this->notificationRepository->delete($id);
        return redirect('notifications/all')->with('sOperation', 'dSuc');

    }
}
