<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RoleRepositoryInterface;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(PermissionRepositoryInterface $roleRepository){
    	$this->roleRepository =  $roleRepository;
    }

    
}
