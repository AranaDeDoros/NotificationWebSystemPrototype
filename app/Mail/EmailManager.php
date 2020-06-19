<?php

namespace App\Mail;
use App\Notification;
use DB;

final class EmailManager{


	protected $groups;
	protected $userAddresses;
    protected $schedule;
    protected $notifications;
	protected $users;
	protected $mailAddresses;

    const NOTIFICATION_ALERT = 1;
    const NOTIFICATION_ERR = 2;
    const NOTIFICATION_INFO = 3;


	public static function getUserEmailAddressesRAW(int $type){

		$notificationType = self::determineType($type);
		return DB::select(DB::raw(
					'select n.id as notifc, g.id, g.groupName, u.name, u.email 
					from notifications n, groups g, users u, 
					group_notification, group_user 
					where group_notification.group_id = g.id 
					and group_notification.notification_id = n.id 
					and n.notificationTypeId = '.$notificationType.'
					and u.id = group_user.id 
					and g.id = group_user.group_id 
					GROUP BY g.id')
					);

	}


	public static function getUserEmailAddressesEloquent(string $type){

		$notifications = [];
		$groups = [];
		$users = [];
		$mailAddresses =[];

		$programmedNotifications = \App\NotificationType::where('description', $type)->get(); 
		foreach($programmedNotifications as $programmedNotification){
			$tmpNotification = $programmedNotification->notification;
			if($tmpNotification !=null){
				array_push($groups, $tmpNotification->groups);
			}
		}

		//return $groups[0];//[0];//->users;
		$nFirstDim = sizeof($groups);

		for ($i=0; $i < $nFirstDim ; $i++) { 
			for ($j=0; $j < sizeof($groups[$i]) ; $j++) { 
				array_push($users, $groups[$i][$j]->users);
			}
		}

		$nUsers = sizeof($users);

		//return $users;

		for ($i=0; $i < $nUsers ; $i++) { 
			for ($j=0; $j < sizeof($users[$i]); $j++) { 
				array_push($mailAddresses, $users[$i][$j]->email);
			}
		}

		
		return $mailAddresses;

	}

	protected static function determineType($type){

		switch ($type) {

			case 'Alert':
			case 1:
				return self::NOTIFICATION_ALERT;
				break;
			case 'Error':
			case 2:
				return self::NOTIFICATION_ERR;
				break;
			case 'Info':
			case 3:
				return self::NOTIFICATION_INFO;
				break;
			default:
				return 0;
				break;

		}

	}


}