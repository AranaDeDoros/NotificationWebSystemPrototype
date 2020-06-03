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

    public function view(Request $request){
    	$id = $request->query('id');
    	$group = Group::find($id);
    	//dd($group);
    	return back()->with('group', $group);

    }
}
