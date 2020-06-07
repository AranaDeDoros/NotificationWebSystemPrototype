<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }
    
	public function index(){
    	$users = $this->userRepository->all();
    	return view('users/all')->with('users', $users);
    }

    public function view(Request $request){
    	$id = $request->query('id');
    	$user = User::find($id);
    	return view('users/view')->with('user', $user);

    }

    public function new(Request $request){
    	////////
    }

    public function update(Request $request){
        
    }

    public function delete($id){
    	return User::find($id)->delete();
    }
}
