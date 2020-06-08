<?php

namespace App\Repositories;

interface NotificationRepositoryInterface{

	public function all();

	public function getInactiveNotifications();

	public function findById($notificationId);

	public function findByNotificationKey($notificationId);

	public function findByGroupId($groupId);

	public function setStatusToInactive($notificationId);
	
	public function getAttachments($notificationId);

	public function getSchedule($notificationId);

	public function getGroups($notificationId);

	public function new($keys);

	public function update($keys);

	public function delete($notificationId);

	
}