<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Repositories\GroupRepositoryInterface;
use App\DatabaseOperations;

class GroupController extends Controller
{

    private $groupRepository;
    private $databaseOperations;
    const GROUPNAME_IN_USE = -1;
    const GROUP_UPDATED = 1;
    const GROUP_INACTIVE = 0;

    public function __construct(GroupRepositoryInterface $groupRepository){
        $this->groupRepository = $groupRepository;
    }

    public function index(){
    	$groups = $this->groupRepository->all();
    	return view('groups/all')->with('groups', $groups);
    }

    public function view($id){

    	$group = $this->groupRepository->findById($id);
    	return view('groups/view')->with('group', $group);

    }

    public function new(Request $request){
        
        $keys = $request->all();
        $isUnique = $this->groupRepository->new($keys);

        if($isUnique == false){
            return back()->with('sOperation', 'nErr');
        }
        
        return back()->with('sOperation','nSuc');

    }

    public function update(Request $request){

        $keys = $request->all();
        $groupResponse = $this->groupRepository->update($keys);

        if($groupResponse == self::GROUP_INACTIVE){
            return redirect('groups/all');
        }
        
        if ($groupResponse == self::GROUPNAME_IN_USE) {
            return back()->with('sOperation', 'uErr');
        }

        return back()->with('sOperation', 'uSuc');
        
    }

    public function delete($id){
        $this->groupRepository->delete($id);
        return redirect('groups/all')->with('sOperation', 'dSuc');
    }

    public function searchGroups(Request $request){
        
        $queryText = $request->query('q');
        $results = Group::where('groupName', 
            "like",  "%".DatabaseOperations::escape_like($queryText)."%")->get(); 
        return response()->json($results);

    }
}
