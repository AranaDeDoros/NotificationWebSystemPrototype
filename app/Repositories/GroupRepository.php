<?php

namespace App\Repositories;
use App\Group;

class GroupRepository implements GroupRepositoryInterface{

	public function all(){

		//orderby where with get ->map()->format();
		return Group::all();


	}

	public function findById($groupId){

	}

	public function findByGroupName($groupId){

	}

	public function setStatusToInactive($groupId){

	}

	public function update($groupId){
		//return redirect('route/.id');
	}

	public function delete($groupId){

	}

	
}