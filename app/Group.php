<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected function format(){

    }
    

    public function groupTypes(){
    	return $this->belongsTo(GroupType::class, 'groupType');
    }


    public function notifications(){
        return $this->hasMany(Notification::class, 'groupId');
    }


    //need one for users...probably
}
