<?php

namespace App\Repositories;
use App\Group;

class GroupRepository implements GroupRepositoryInterface{

	public function all(){

		return Group::orderBy('groupName')->where('status',1)->get();
		//orderby where with get ->map()->format();
		
	}

	public function getInactiveGroups(){

		return Group::orderBy('groupName')->where('status',0)->get();

	}

	public function findById($groupId){

		return Group::find($groupId);

	}

	public function findByGroupName($groupName){

		return Group::where('groupName', 'like', '%'.$groupName.'%')->get();

	}

	public function setStatusToInactive($groupId){
		$updatedGroup = Group::find($groupId);
		$updatedGroup->status = 0;
		return $updatedGroup->save();
	}

	public function new($keys){

		$newGroup = New Group();
		$newGroup->groupName = $keys['txtgroupName'];
		$newGroup->groupType = $keys['cmbGroupType'];
		$newGroup->status = $keys['cmbStatus'];
		return $newGroup->save();
	}

	public function update($keys){

		$group = $this->findById($keys['id']);
		$group->groupName = $keys['txtgroupName'];
		$group->groupType = $keys['cmbGroupType'];
		$group->status =  $keys['cmbStatus'];
		$group->save();

		if($group->status < 1){
			return true;
		}

		return false;

	
	}

	public function delete($groupId){

		return $this->setStatusToInactive($groupId);
	}

	
}