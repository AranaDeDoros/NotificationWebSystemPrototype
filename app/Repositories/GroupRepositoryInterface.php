<?php

namespace App\Repositories;

interface GroupRepositoryInterface{

	public function all();

	public function getInactiveGroups();

	public function findById($groupId);

	public function findByGroupName($groupName);

	public function setStatusToInactive($groupId);

	public function getNotifications($groupId);

	public function getGroupTypes($groupId);

	public function new($keys);
	
	public function update($keys);

	public function delete($groupId);

	public function syncRelationshipData($data, $group);
	
}