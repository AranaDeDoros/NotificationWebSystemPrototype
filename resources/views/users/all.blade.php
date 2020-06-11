@extends('layouts.general')
@section('content')

@section('title', 'Users')

<x-return-button routeName="index"/>

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
							<label for="emailAddress form-text ">E-mail</label>
					  		<input type="email" id="emailAddress" class="form-control" name="txtEmail"
					  		required/>
						</div>
						<div class="col">
							<label for="userAdd form-text ">Group</label>
					  		<select id="userAdd" class="form-control" name="cmbGroups"
					  		required multiple>
					             <option value="1">tipo</option>
							</select>		
						</div>
					</div>
 
		        <div class="row mt-2">
		            <div class="col-6">
		              <label for="q form-text ">Search for groups</label>
		              <input id="query" type="text" class="form-control" name="q" placeholder="groupname">
		            </div>
		            <div class="col-4">
		            	<div class="autocomplete-suggestion"></div>
		               <label for="tags">Groups</label>
		               <input name="tags" placeholder="add somebody" class="form-control" value="">
		             </div>
		            <div class="col-2 text-center">
		              <br>
		              <button class="btn btn-primary btn-md btn-round mb-2 " id="btnTagsDes" type="primary">
		              Deselect all groups</button>
		              <button id="btnNewUser" type="submit" class="btn btn-primary btn-block pb-2 pr-3 pl-3 ">Create
				      </button>
		            </div>
		        </div>					

			</form>
	</fieldset>
</div>


<x-alert entity="User" :operation="session('sOperation') != '' ? session('sOperation') : ''" field="Username"  />



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
	      	KEY HACIA GRUPOS
	      </td>
	      <td>
	       <form action="{{route('users.delete', ['id'=>$user->id])}}" method="post" accept-charset="utf-8">
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

<script src="{{asset('js/entitySearch.js')}}"></script>

@endsection