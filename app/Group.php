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


    //every group has one type only
    public function groupType(){
        return $this->belongsTo(GroupType::class, 'groupTypeId');
    }


    //many to many
    public function notifications(){
        return $this->belongsToMany(Notification::class, 'groupId');
    }


    //many to many
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
