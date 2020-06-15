<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupType extends Model
{
	//one to one
    public function group(){
    	return $this->hasOne(Group::class, 'groupTypeId');
    }
}
