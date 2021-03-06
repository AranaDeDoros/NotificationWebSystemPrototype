@extends('layouts.general')
@section('content')

@section('title', 'Users')

<x-return-button routeName="users.all"/>

<div class="container">
	<fieldset class="form-group">
		<legend> EDIT USER </legend>
		<form method="POST" action="{{route('users.update',['id' => $user->id ])}}">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col">
						<label for="userName form-text ">Name</label>
				  		<input type="text" id="userName" class="form-control" name="txtUsername"
				  		required value="{{$user->name}}">
					</div>
<!-- 					<div class="col">
	<label for="groupAdd form-text ">Group</label>
				  		<select id="groupAdd" class="form-control" name="cmbGroups"
				  		required multiple>
				             <option value="1" selected="">111</option>
	</select>		
</div> -->
					<div class="col">
						<label for="txtEmail form-text ">E-mail</label>
				  		<input type="email" id="emailAddress" class="form-control" name="txtEmail"
				  		required value="{{$user->email}}">
					</div>
		           <div class="col">
			            <label for="txtStatus" class="form-text">Status</label>
			             <select id="groupStatus" class="form-control" name="cmbStatus"
			              required>
			              @if($user->status)
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
		            <label for="q" class="form-text ">Search for groups</label>
		            <input id="query" type="text" class="form-control" name="q" placeholder="groupname">
		          </div>
		          <div class="col-4">
		          	 <div class="autocomplete-suggestion"></div>
		             <label for="tags">Groups</label>
		             <input name="tags" placeholder="add somebody" class="form-control" value="">
		           </div>
		          <div class="col-2 text-center">
		              <br>
		              <button class="btn btn-primary btn-md btn-round mb-2 " id="btnTagsDes" type="button">
		              <i class="fi-xwpuxl-check"></i> Unselect all</button>
			          <button id="btnUpdateUser" type="submit" class="btn btn-primary btn-block pb-2 pr-3 pl-3 ">
			            	<i class="fi-xwsuxl-update"></i> Update
					  </button>
		            <br>
		        </div>

		</form>
	</fieldset>
            <div class="container mb-2">
                <div class="alert alert-danger" role="alert">
                 <form action="{{route('users.delete', ['id'=>$user->id])}}" method="post" accept-charset="utf-8">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="btnDeleteUser"
                    class="btn btn-md btn-round btn-primary"><i class="fi-xnsuxl-trash-bin"></i> Delete </button>
                     <span class="ml-2"><strong>This action cannot be reverted.</strong> </span>
                 </form>

                </div>
            </div>

</div>


<x-alert entity="User" :operation="session('sOperation') != '' ? session('sOperation') : ''" field="Username"  />

<script src="{{asset('js/entitySearch.js')}}"></script>

@endsection