<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];


    public function groupTypes(){
    	return $this->belongsTo(GroupType::class, 'groupType');
    }


    public function notifications(){
        return $this->hasMany(Notification::class, 'groupId');
    }

}
