<?php

namespace App\Repositories;
use App\Group;

class GroupRepository implements GroupRepositoryInterface{

	public function all(){

		return Group::orderBy('groupName')->where('status', 1)->get();
		//orderby where with get ->map()->format();
		
	}

	public function getInactiveGroups(){

		return Group::orderBy('groupName')->where('status', 0)->get();

	}

	public function findById($groupId){

		return Group::find($groupId);

	}

	public function findByGroupName($groupName){
		return Group::where('groupName', '=', $groupName)->get();
		//return Group::where('groupName', 'like', '%'.$groupName.'%')->get();

	}

	public function setStatusToInactive($groupId){
		$updatedGroup = Group::find($groupId);
		$updatedGroup->status = 0;
		return $updatedGroup->save();
	}


	public function getNotifications($groupId){

		return Group::find($groupId)->notifications;

	}

	public function getGroupTypes($groupId){

		return Group::find($groupId)->getGroupTypes;

	}


	public function new($keys){

		if(sizeof($this->findByGroupName($keys['txtGroupName'])) > 0){
			return false;
		}

		
		$newGroup = New Group();
		$newGroup->groupName = $keys['txtGroupName'];
		$newGroup->groupType = $keys['cmbGroupType'];
		$newGroup->status = 1;
		return $newGroup->save();

	}

	public function update($keys){

		$group = $this->findById($keys['id']);
		$newGroupname =$keys['txtGroupName'];

		
		if(sizeof($this->findByGroupName($newGroupname)) > 0
		&& $group->groupName != $newGroupname){
			return -1;
		}

		$group->groupName = $keys['txtGroupName'];
		$group->groupType = $keys['cmbGroupType'];
		$group->status =  $keys['cmbStatus'];
		$group->save();


		if($group->status < 1){
			return 0;
		}

		
		return 1;

	
	}

	public function delete($groupId){

		return $this->setStatusToInactive($groupId);
	}

	public function syncRelationshipData($data, $group){

		$group->users->syncWithoutDetaching($data);
		$group->notification->syncWithoutDetaching($data);
		
	}

	
}