<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	//many to many
    public function roles(){
    	return $this->hasOne(Role::class, 'permissionId');
    }
}
