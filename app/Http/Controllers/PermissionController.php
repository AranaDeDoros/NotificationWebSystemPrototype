<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PermissionRepositoryInterface;

class PermissionController extends Controller
{
	
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository){
    	$this->permissionRepository =  $permissionRepository;
    }


}
