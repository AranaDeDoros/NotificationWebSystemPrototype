<?php

namespace App\Repositories;
use App\Role;

class RoleRepository implements RoleRepositoryInterface{

	public function all(){
		return Role::all();
	}

	
	
}