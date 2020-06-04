@extends('layouts.general')
@section('content')

@section('title', 'Users')

<div class="container">
	<fieldset class="form-group">
		<legend> EDIT USER </legend>
		<form method="POST" action="{{route('users.update',['id' => 1 ])}}">
				@csrf
				@method('PUT')
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
				             <option value="">tipo</option>
						</select>		
					</div>
					<div class="col">
						<label for="emailAddress form-text ">E-mail</label>
				  		<input type="email" id="emailAddress" class="form-control" name="email"
				  		required/>
					</div>
					<div class="col">
						<br>
						<button id="btnUpdateUser" type="submit" class="btn btn-primary btn-block pb-2 pr-3 pl-3 ">Update
				     	</button>
					</div>
				</div>

		</form>
	</fieldset>
</div>

@endsection