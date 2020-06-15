<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    
    
    //one to one
    public function notification(){
    	return $this->hasOne(Notification::class, 'scheduleTypeId');
    }
}
