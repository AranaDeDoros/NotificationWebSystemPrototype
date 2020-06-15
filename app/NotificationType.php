<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    //one to one
    public function notification(){
    	return $this->hasOne(Notification::class, 'notificationTypeId');
    }
}
