@extends('layouts.general')
@section('content')

@section('title', 'Groups')

<x-return-button routeName="index"/>

<div class="container">
  <fieldset class="form-group">
    <legend> ADD A NEW GROUP </legend>
      <form method="POST" action="{{route('groups.new')}}">
          @csrf
          <div class="row">
            <div class="col">
              <label for="groupName form-text ">Group Name</label>
                <input type="text" id="groupName" class="form-control" name="txtGroupName"
                required />
            </div>
            <div class="col">
              <label for="groupTypeAdd form-text ">Group Type</label>
                <select id="groupTypeAdd" class="form-control" name="cmbGroupType"
                required>
              </select>   
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-6">
              <label for="q form-text ">Search for users</label>
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
                <i class="fi-xwpuxl-check"></i> Unselect all
              </button>
              <button id="btnNewGroup" type="submit" class="btn btn-primary btn-block pb-2 pr-3 pl-3 ">
                <i class="fi-cwluxl-plus-wide"></i> Add
              </button>
            </div>
          </div>

      </form>
  </fieldset>
</div>

<x-alert entity="Group" :operation="session('sOperation') != '' ? session('sOperation') : ''" field="Groupname"  />


<div class="container text-center">
	<table class="table" id="tblGroups">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">GroupName</th>
        <th scope="col">Status</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
  <tbody>

  	@foreach($groups as $group)
     <tr>
      <th scope="row">{{$group->id}}</th>
      <td>
      	<a href="{{route('groups.view', ['id'=>$group->id])}}" 
      	id="group-ID" title="View Group">
      	{{$group->groupName}}	
      	</a>
      </td>
      <td class="statusLabel">
      	@if($group->status > 0)
      		<span class="text-muted">ACTIVE</span>
      	@else
      		<span class="text-muted">INACTIVE</span>
      	@endif
      </td>
      <td>
       <form action="{{route('groups.delete', ['id'=>$group->id])}}" method="post" accept-charset="utf-8">
        @csrf
        @method('DELETE')
        <button type="submit" id="btnDeleteGroup"
        class="btn btn-lg btn-round"> X </button>
       </form>
      </td>
    </tr>
	@endforeach

  </tbody>
</table>
  {{ $groups->links() }}
</div>

<script src="{{asset('js/entitySearch.js')}}"></script>
<script src="{{asset('js/retrieveTypes.js')}}"></script>

@endsection