<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Repositories\UserRepositoryInterface;
use App\DatabaseOperations;

class UserController extends Controller
{

    private $userRepository;
    private $databaseOperations;

    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }
    
	public function index(){
    	$users = $this->userRepository->all();
    	return view('users/all')->with('users', $users);
    }

    public function view($id){
    	
        $user = $this->userRepository->findById($id);
        return view('users/view')->with('user', $user);

    }

    public function new(Request $request){
    	
        $keys = $request->all();
        $isUnique = $this->userRepository->new($keys);

        if($isUnique == false){
            return back()->with('sOperation', 'nErr');
        }

        return back()->with('sOperation','nSuc');

    }

    public function update(Request $request){

        $keys = $request->all();
        $userResponse = $this->userRepository->update($keys);

        if($userResponse == 0){
            return redirect('users/all');
        }
        
        if ($userResponse == -1) {
            return back()->with('sOperation', 'uErr');
        }

        return back()->with('sOperation', 'uSuc');
    }

    public function delete($id){
        $this->userRepository->delete($id);
        return redirect('users/all')->with('sOperation', 'dSuc');
    }

    public function searchUsers(Request $request){

        $queryText = $request->query('q');
        $results = User::where('name', 
            "like",  "%".DatabaseOperations::escape_like($queryText)."%")->get(); 
        return response()->json($results);
    
    }
}
