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
        $this->groupRepository->new($keys);
        return back()->with('sucess','group created');

    }

    public function update(Request $request){
        $keys = $request->all();
        $isDeleted = $this->groupRepository->update($keys);

        if($isDeleted){
            return redirect('groups/all');
        }

        return back()->with('success', 'group updated');
        
    }

    public function delete($id){
        $this->groupRepository->delete($id);
        return redirect('groups/all')->with('success', 'group deleted');
    }
}
