<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupType extends Model
{

	    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'created_at', 'updated_at', 'deleted_at'
    ];

	//one to one
    public function group(){
    	return $this->hasOne(Group::class, 'groupTypeId');
    }
}
