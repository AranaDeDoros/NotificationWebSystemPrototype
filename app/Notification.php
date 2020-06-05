<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
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
