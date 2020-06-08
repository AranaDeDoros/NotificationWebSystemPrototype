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
		$updatedNotification->status = 0;
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

		if(sizeof($this->findByNotificationKey($keys['txtNotifKey'])) > 0){
			return false;
		}

		
		$newNotification = New Notification();
		$newNotification->notificationType = $keys['txtUsername'];
		$newNotification->groupId = $keys['txtEmail'];
		$newNotification->scheduleType = '12345789';
		$newNotification->attachments = 0;
		$newNotification->notificationStatus = 1;
		return $newNotification->save();

	}

	public function update($keys){
		$notification = $this->findById($keys['id']);
		$newNotificationKey =$keys['txtNotifKey'];

		
		if(sizeof($this->findByNotificationKey($newNotificationKey)) > 0
		&& $notification->notificationKey != $newNotificationKey){
			return -1;
		}

		$notification->notificationType = $keys['txtUsername'];
		$notification->groupId = $keys['txtEmail'];
		$notification->scheduleType = $keys['txtEmail'];
		$notification->attachments = 0;
		$notification->status =  $keys['cmbStatus'];
		$notification->save();


		if($notification->status < 1){
			return 0;
		}

		
		return 1;

	}

	public function delete($notificationId){

		return $this->setStatusToInactive($notificationId);
	}

	
	
}