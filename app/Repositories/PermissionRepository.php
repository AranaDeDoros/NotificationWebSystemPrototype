<?php

namespace App\Repositories;
use App\Permission;

class PermissionRepository implements PermissionRepositoryInterface{

	public function all(){
		return Permission::all();
	}
	
}