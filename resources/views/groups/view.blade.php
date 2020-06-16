@extends('layouts.general')
@section('content')

@section('title', 'Groups')

<x-return-button routeName="groups.all"/>

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
              <input type="text" id="groupTypeAdd" class="form-control" name="cmbGroupType"
              required readonly value="{{$group->groupType->description}}">
              {{--<select id="groupTypeAdd" class="form-control" name="cmbGroupType"
              required disabled>
                     <option value="{{$group->groupType->id}}">{{$group->groupType->description}}</option>
              </select> --}}
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
            <label for="q" class="form-text ">Search for users</label>
            <input id="query" type="text" class="form-control" name="q" placeholder="username">
          </div>
          <div class="col-4">
             <div class="autocomplete-suggestion"></div>
             <label for="tags">Users</label>
             <input name="tags" placeholder="add somebody" class="form-control" value="">
           </div>
          <div class="col-2">
            <br>
            <button class="btn btn-primary btn-md btn-round mb-2 " id="btnTagsDes" type="button">
              <i class="fi-xwpuxl-check"></i> Unselect all</button>
            <button id="btnUpdateGroup" type="submit" class="btn btn-primary btn-block pb-2 pr-3 pl-3 ">
              <i class="fi-xwsuxl-update"></i> Update
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
                    class="btn btn-md btn-round btn-primary"><i class="fi-xnsuxl-trash-bin"></i> Delete </button>
                     <span class="ml-2"><strong>This action cannot be reverted.</strong> </span>
                 </form>

                </div>
            </div>

          </div>
        </div>


</div>

<x-alert entity="Group" :operation="session('sOperation') != '' ? session('sOperation') : ''" field="Groupname"  />

<script src="{{asset('js/entitySearch.js')}}"></script>

@endsection