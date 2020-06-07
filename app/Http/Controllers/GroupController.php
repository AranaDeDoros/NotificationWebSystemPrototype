<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Repositories\GroupRepositoryInterface;

class GroupController extends Controller
{

    private $groupRepository;

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
            return back()->with('nErr', 'groupname is already being used');
        }

        return back()->with('nSuc','group created');

    }

    public function update(Request $request){

        $keys = $request->all();
        $groupResponse = $this->groupRepository->update($keys);

        if($groupResponse == 0){
            return redirect('groups/all');
        }
        
        if ($groupResponse == -1) {
            return back()->with('uErr', 'groupname already in use');
        }

        return back()->with('uSuc', 'group updated');
        
    }

    public function delete($id){
        $this->groupRepository->delete($id);
        return redirect('groups/all')->with('dSuc', 'group deleted');
    }
}
