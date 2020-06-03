<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function index(){
    	$users = User::all();
    	return view('users/all')->with('users', $users);
    }

    public function view(Request $request){
    	$id = $request->query('id');
    	$user = User::find($id);
    	return back()->with('user', $user);

    }
}
