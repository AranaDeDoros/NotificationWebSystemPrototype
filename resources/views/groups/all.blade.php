@extends('layouts.general')
@section('content')

@section('title', 'Groups')

<div class="container">
  <fieldset class="form-group">
    <legend> CREATE A NEW GROUP </legend>
      <form method="POST" action="{{route('groups.new')}}">
          @csrf
          <div class="row">
            <div class="col">
              <label for="groupName form-text ">Group Name</label>
                <input type="text" id="groupName" class="form-control" name="txtgroupName"
                required />
            </div>
            <div class="col">
              <label for="groupTypeAdd form-text ">Group Type</label>
                <select id="groupTypeAdd" class="form-control" name="cmbGroupType"
                required>
                       <option value="">tipo</option>}
              </select>   
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-6">
              <label for="userSearch form-text ">Search for users</label>
              <input type="text" id="userSearch"class="form-control" name="txtUserSearch">
            </div>
            <div class="col-4">
               <label for="txtMessage">Users</label>
               <textarea class="form-control" id="txtMessage" rows="3" required readonly></textarea>
             </div>
            <div class="col-2">
              <br><br><br>
              <button id="btnNewGroup" type="submit" class="btn btn-primary btn-block pb-2 pr-3 pl-3 ">Create
                </button>
            </div>
          </div>

      </form>
  </fieldset>
</div>


<div class="container text-center">
	<table class="table" id="tblGroups">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">GroupName</th>
        <th scope="col">Status</th>
        <th scope="col">Borrar</th>
      </tr>
    </thead>
  <tbody>

  	@foreach($groups as $group)
     <tr>
      <th scope="row">{{$group->id}}</th>
      <td>
      	<a href="{{route('groups.view', ['id'=>$group->id])}}" 
      	id="group-ID" title="View Group">
      	Los Discipulos de Demian
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
       <form action="{{route('groups.delete')}}" method="post" accept-charset="utf-8">
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
</div>
@endsection