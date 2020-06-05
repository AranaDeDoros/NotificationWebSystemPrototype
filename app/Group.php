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


    public function groupType(){
    	return $this->belongsTo(GroupType::class, 'id');
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'id');
    }

    public function notifications(){
        return $this->hasMany(Notification::class, 'id');
    }

}
