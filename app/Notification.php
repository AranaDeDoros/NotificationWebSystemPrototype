<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
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

    //one to one
    public function notificationType(){
    	return $this->belongsTo(NotificationType::class, 'notificationTypeId');
    }


    //one to one
    public function schedule(){
        return $this->belongsTo(Schedule::class, 'scheduleTypeId');
    }
    
    //many to many
    public function groups(){
    	return $this->belongsToMany(Group::class);
    }


}
