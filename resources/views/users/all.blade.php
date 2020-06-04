@extends('layouts.general')
@section('content')

<div class="container">
	<fieldset class="form-group">
		<legend> CREATE A NEW USER </legend>
			<form method="POST" action="{{route('users.new')}}">
					@csrf
					<div class="row">
						<div class="col">
							<label for="userName form-text ">Name</label>
					  		<input type="text" id="userName" class="form-control" name="txtUsername"
					  		required />
						</div>
						<div class="col">
							<label for="groupAdd form-text ">Group</label>
					  		<select id="groupAdd" class="form-control" name="cmbGroups"
					  		required>
					             <option value="">tipo</option>}
							</select>		
						</div>
						<div class="col">
							<label for="emailAddress form-text ">E-mail</label>
					  		<input type="email" id="emailAddress" class="form-control" name="email"
					  		required/>
						</div>
						<div class="col">
							<br>
							<button id="btnNewUser" type="submit" class="btn btn-primary btn-block pb-2 pr-3 pl-3 ">Create
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
	      <th scope="col">Name</th>
	      <th scope="col">E-mail</th>
	      <th scope="col">Group(s)</th>
	      <th scope="col">Remove</th>
	    </tr>
	  </thead>
	  <tbody>

	  	@foreach($users as $user)
	     <tr>
	      <th scope="row">{{$user->id}}</th>
	      <td>
	      	<a href="{{route('users.view', ['id'=>$user->id])}}" 
	      	id="user-ID" title="View User">
	      	{{$user->name}}
	      	</a>    	
	      </td>
	      <td>
	      	{{$user->email}}
	      </td>
	      <td>
	      	KEY HACIA GROUP(S)
	      </td>
	      <td>
	       <form action="{{route('users.delete')}}" method="post" accept-charset="utf-8">
	       	@csrf
       		@method('DELETE')
       		<button type="submit" id="btnDeleteUser"
	      	class="btn btn-lg btn-round"> X </button>
       		</form>
	      </td>
	    </tr>
		@endforeach

	  </tbody>	
	</table>
</div>
@endsection