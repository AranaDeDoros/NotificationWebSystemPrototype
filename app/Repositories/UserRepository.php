<?php

namespace App\Repositories;
use App\User;

class UserRepository implements UserRepositoryInterface{

	public function all(){

		return User::orderBy('name')->where('status', 1)->get();
		
	}

	public function getInactiveUsers(){
		return User::orderBy('name')->where('status', 0)->get();
	}


	public function findById($userId){

		return User::find($userId);

	}

	public function findByUsername($userName){

		return User::where('name', '=', $userName)->get();

	}

	public function findByEmail($email){

		return User::where('mail', '=', $email)->get();

	}

	public function setStatusToInactive($userId){
		$updatedUser = User::find($userId);
		$updatedUser->status = 0;
		return $updatedUser->save();
	}

	public function getRoles($userId){

		return User::find($userId)->roles;

	}

	public function getGroups($userId){


		return User::find($userId)->groups;

	}

	public function new($keys){

		if(sizeof($this->findByUsername($keys['txtUsername'])) > 0){
			return false;
		}

		
		$newUser = New User();
		$newUser->name = $keys['txtUsername'];
		$newUser->email = $keys['txtEmail'];
		$newUser->password = '12345789';
		$newUser->groups = 'ADADAS';
		$newUser->roleId = 1;
		$newUser->status = 1;
		return $newUser->save();

	}

	public function update($keys){
		$user = $this->findById($keys['id']);
		$newUsername =$keys['txtUsername'];

		
		if(sizeof($this->findByUsername($newUsername)) > 0
		&& $user->name != $newUsername){
			return -1;
		}

		$user->name = $keys['txtUsername'];
		$user->email = $keys['txtEmail'];
		$user->status =  $keys['cmbStatus'];
		$user->save();


		if($user->status < 1){
			return 0;
		}

		
		return 1;

	}

	public function delete($userId){

		return $this->setStatusToInactive($userId);
	}



	
	
}