<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	//one for each user
    public function user(){
        return $this->hasOne(User::class, 'roleId');
    }

    public function permissions(){
        return $this->belongsTo(Permission::class, 'permissionId');
    }
}
