<?php

namespace App\Repositories;
use App\Notification;

class NotificationRepository implements NotificationRepositoryInterface{

	public function all(){

		return Notification::orderBy('created_at', 'desc')->where('notificationStatus', 1)->get();
		
	}

	public function getInactiveNotifications(){
		return Notification::orderBy('created_at')->where('notificationStatus', 0)->get();
	}


	public function findById($notificationId){

		return Notification::find($notificationId);

	}

	public function findByNotificationKey($notificationKey){

		return Notification::where('notificationKey', '=', $notificationKey)->get();

	}

	public function findByGroupId($groupId){

		return Notification::where('groupId', '=', $groupId)->get();

	}

	public function setStatusToInactive($notificationId){
		$updatedNotification = Notification::find($notificationId);
		$updatedNotification->notificationStatus = 0;
		return $updatedNotification->save();
	}

	public function getAttachments($notificationId){

		return Notification::where('attachments', 1)->get();

	}

	public function getSchedule($notificationId){

		return Notification::find($notificationId)->schedule;

	}

	public function getGroups($notificationId){


		return Notification::find($notificationId)->groups;

	}

	public function new($keys){

/*		if(sizeof($this->findByNotificationKey($keys['txtNotifKey'])) > 0){
			return false;
		}*/

		$newNotification = New Notification();
		$newNotification->notificationTypeId = $keys['cmbNotifTypes'];
		//$newNotification->groupId = $keys['cmbGroups'];
		$newNotification->scheduleTypeId = $keys['cmbSchedules'];
		$newNotification->attachments = 0;
		$newNotification->customMessage = 'test'; //$keys['txtMsg'];
		$newNotification->notificationStatus = 1;
		$newNotification->save();
		$this->syncGroupRelationshipData($keys['tags'], $newNotification->id);

	}

	public function update($keys){
		$notification = $this->findById($keys['id']);
		//$newNotificationKey =$keys['txtNotifKey'];

		
/*		if(sizeof($this->findByNotificationKey($newNotificationKey)) > 0
		&& $notification->notificationKey != $newNotificationKey){
			return -1;
		}*/

		
		$notification->notificationTypeId = $keys['cmbNotifTypes'];
		//$notification->groupId = $keys['cmbGroups'];
		$notification->scheduleTypeId = $keys['cmbSchedules'];
		$notification->attachments = 0;
		$notification->customMessage = 'test';//$keys['txtMsg'];
		$notification->notificationStatus =  $keys['cmbStatus'];
		$notification->save();
		$this->syncGroupRelationshipData($keys['tags'], $notification->id);


		if($notification->notificationStatus < 1){
			return 0;
		}

		
		return 1;

	}

	public function delete($notificationId){

		return $this->setStatusToInactive($notificationId);
	}

	public function syncGroupRelationshipData($groupIds, $notificationId){

		$notification = $this->findById($notificationId);
		$groupIdsToBeAttached =  str_replace("uId", "", explode(",",$groupIds));
		$notification->groups()->syncWithoutDetaching($groupIdsToBeAttached);
		
	}


	
	
}