<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationsLogger extends Model
{
    public function writeToLog($data){
    	//$data->...
    	$record = new NotificationsLogger();
    	$record->save();

    }

    public function retrieveAllRecords(){

    	return NotificationsLogger::all();

    }
}
