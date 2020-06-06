<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->hasMany(User::class, 'roleId');
    }

    public function permissions(){
    	return $this->belongsTo(Permission::class, 'permissionId');
    }
}
