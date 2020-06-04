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
    	return view('groups/view')->with('group', $group);

    }

    public function new(Request $request){
        ////////
    }

    public function update(Request $request){
        
    }

    public function delete($id){
        return Group::find($id)->delete();
    }
}
