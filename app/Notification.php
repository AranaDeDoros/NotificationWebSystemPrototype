<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function notificationType(){
    	return $this->belongsTo(NotificationType::class, 'id');
    }

    public function groups(){
    	return $this->belongsToMany(Group::class, 'id');
    }

    


}
