<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
class GroupController extends Controller
{
    public function index(){
    	$groups = Group::all();
    	return view('groups/all')->with('groups', $groups);
    }
}
