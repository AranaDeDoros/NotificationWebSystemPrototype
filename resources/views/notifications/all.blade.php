@extends('layouts.general')
@section('content')

@section('title', 'Notifications')

<x-return-button routeName="index"/>

<div class="container">
	<fieldset class="form-group">
		<legend> CREATE A NEW NOTIFICATION </legend>
		<form method="POST" action="{{route('notifications.new')}}" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col">
						<label for="notifTypes form-text ">Type</label>
				  		<select id="notifTypes" class="form-control" name="cmbNotifTypes"
				  		required>
				             <option value="1">tipo</option>}
						</select>			
					</div>
					<div class="col">
						<label for="groupAdd form-text ">Group</label>
				  		<select id="groupAdd" class="form-control" name="cmbGroups"
				  		required>
				             <option value="2">tipo</option>}
						</select>		
					</div>
					<div class="col">
						<label for="scheduleTypes form-text ">Schedule</label>
				  		<select id="scheduleTypes" class="form-control" name="cmbSchedules"
				  		required>
				             <option value="3">tipo</option>}
						</select>			
					</div>
				</div>
	          	<div class="row">
		            <div class="col-6">
		              <label for="q form-text ">Search for groups</label>
		              <input id="query" type="text" class="form-control" name="q" placeholder="groupname">
		            </div>
		            <div class="col-4">
		               <div class="autocomplete-suggestion"></div>
		               <label for="tags">Groups</label>
		               <input name="tags" placeholder="add somebody" class="form-control" value="">
		            </div>
		            <div class="col-2">
		              <br>
		              <button class="btn btn-primary btn-md btn-round mb-2 " id="btnTagsDes" type="primary">
		              Deselect all users</button>
		              <button id="btnNewGroup" type="submit" class="btn btn-primary btn-block pb-2 pr-3 pl-3 ">Create
		                </button>
		            </div>
	            </div>
				AGREGAR CAMPO PARA INFO ADICIONAL?
				<div class="row">
					<div class="col-12">
						<div class="form-group form-text ">
			                 <label for="txtMessage">Extra Info</label>
			                 <textarea class="form-control" id="txtMessage"  name="txtMsg" rows="3" required></textarea>
	  					</div>
					</div>
				</div>

			    <div class="form-group">
				   <div class="row">
					   	<div class="col-8">
					   		 <label for="inptAttachment form-text ">Attachment</label>
					    	<input type="file" class="form-control-file" name="inptAttachment">
						</div>
					    <div class="col-4">
					     	<button id="btnNewNotif" type="submit" class="btn btn-primary pb-2 pr-3 pl-3 mb-5">Create</button>
					   	</div>
				   </div>
				</div>	

			 

		</form>
	</fieldset>
</div>

<x-alert entity="Notification" :operation="session('sOperation') != '' ? session('sOperation') : ''" field=""  />


<div class="container text-center">
<table class="table" id="tblGroups">
  	<thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tipo</th>
      <th scope="col">Description</th>
      <th scope="col">Destinataries</th>
      <th scope="col">Status</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($notifications as $notification)
     <tr>
      <th scope="row">{{$notification->id}}</th>
      <td>
      	{{$notification->notificationType}}
      </td>
      <td>
      	<a href="{{route('notifications.view', $notification->id)}}" 
      	id="notification-ID" title="View Notification">
      	DESCRIPCION
      	</a>
      </td>
      <td>
      	{{$notification->notificationType}}
      </td>
      
      <td class="statusLabel">
      	@if($notification->notificationStatus > 0)
      		<span class="text-muted">ACTIVE</span>
      	@else
      		<span class="text-muted">INACTIVE</span>
      	@endif
      </td>
      <td>

       <form action="{{route('notifications.delete', ['id' => $notification->id])}}" method="post" accept-charset="utf-8">
       	@csrf
       	@method('DELETE')
       	<button type="submit" id="btnDeleteNotif"
      	class="btn btn-lg btn-round"> X </button>
       </form>

      </td>
    </tr>
	@endforeach

  </tbody>
</table>
</div>

@include('layouts/summernote')

<script src="{{asset('js/entitySearch.js')}}"></script>

@endsection