<?php

namespace App\Repositories;

interface UserRepositoryInterface{

	public function all();

	public function getInactiveUsers();

	public function findById($userId);

	public function findByUsername($userName);

	public function findByEmail($email);

	public function setStatusToInactive($userId);

	public function getGroups($userId);

	public function getRoles($userId);

	public function new($keys);

	public function update($keys);

	public function delete($userId);

	public function syncRelationshipData($groupIds, $userId);
		
}