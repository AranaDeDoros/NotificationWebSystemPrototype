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
        'password', 'remember_token', 'groups'
    ];

	protected function format(){

    }

    public function notificationTypes(){
    	return $this->belongsTo(NotificationType::class, 'notificationType');
    }

    public function groups(){
    	return $this->belongsTo(Group::class, 'groupId');
    }

    public function schedule(){
    	return $this->belongsTo(Schedule::class, 'scheduleType');
    }
    


}
