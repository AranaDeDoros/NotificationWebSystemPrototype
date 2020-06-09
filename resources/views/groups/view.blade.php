@extends('layouts.general')
@section('content')

@section('title', 'Groups')
<div class="container">
  <fieldset class="form-group">
    <legend> EDIT GROUP </legend>
    <form method="POST" action="{{route('groups.update', ['id'=>$group->id])}}">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col">
            <label for="groupName" class="form-text ">Group Name</label>
              <input type="text" id="groupName" class="form-control" name="txtGroupName"
              required value="{{$group->groupName}}" />
          </div>
          <div class="col">
            <label for="groupTypeAdd" class="form-text ">Group Type</label>
              <select id="groupTypeAdd" class="form-control" name="cmbGroupType"
              required>
                     <option value="{{$group->groupType}}">{{$group->groupTypes->description}}</option>
              </select>   
          </div>
          <div class="col">
            <label for="txtStatus" class="form-text">Status</label>
             <select id="groupStatus" class="form-control" name="cmbStatus"
              required>
              @if($group->status)
                 <option value="1" selected>ACTIVE</option>
                 <option value="0">INACTIVE</option>
              @else
                <option value="0" selected>INACTIVE</option>
                <option value="1">ACTIVE</option>
              @endif
              </select> 
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-6">
            <label for="txtUserSearch" class="form-text ">Search for users</label>
            <input type="text" id="userSearch"class="form-control" name="txtUserSearch">
          </div>
          <div class="col-4">
             <label for="txtUsers">Users</label>
             <textarea class="form-control" name="txtUsers" rows="3" required readonly></textarea>
           </div>
          <div class="col-2">
            <br>
            <button id="btnUpdateGroup" type="submit" class="btn btn-primary btn-block pb-1 pr-3 pl-3 ">Update
            </button>
            <br>
          </div>
    </form>
  </fieldset>

             <div class="container mb-2">
                <div class="alert alert-danger" role="alert">
                 <form action="{{route('groups.delete', ['id'=>$group->id])}}" method="post" accept-charset="utf-8">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="btnDeleteGroup"
                    class="btn btn-md btn-round btn-primary"> Delete </button>
                     <span class="ml-2"><strong>This action cannot be reverted.</strong> </span>
                 </form>

                </div>
            </div>

          </div>
        </div>


</div>

<x-alert entity="Group" :operation="session('sOperation') != '' ? session('sOperation') : ''" field="Groupname"  />

@endsection