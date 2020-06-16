@extends('layouts.general')
@section('content')

@section('title', 'Notifications')

<x-return-button routeName="notifications.all"/>
{{$notification->schedules}}
<div class="container">
	<fieldset class="form-group">
		<legend> EDIT NOTIFICATION </legend>
		<form method="POST" action="{{route('notifications.update', ['id'=>$notification->id])}}" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col">
						<label for="notifTypes form-text ">Type</label>
				  		<select id="notifTypes" class="form-control" name="cmbNotifTypes"
				  		required>
				             <option value="{{$notification->notificationType->id}}">
				             	{{$notification->notificationType->description}}</option>}
						</select>			
					</div>
					<div class="col">
						<label for="groupAdd form-text ">Group</label>
				  		<select id="groupAdd" class="form-control" name="cmbGroups"
				  		required>
				             @foreach($notification->groups as $group)
								<option value="{{$group->id}}">{{$group->groupName}}</option>}
				             @endforeach
				             
						</select>		
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="scheduleTypes form-text ">Schedule</label>
				  		<select id="scheduleTypes" class="form-control" name="cmbSchedules"
				  		required>
				             <option value="{{$notification->schedule->id}}">{{$notification->schedule->description}}</option>
						</select>			
					</div>
					<div class="col">
		            	<label for="cmbStatus" class="form-text">Status</label>
			            <select id="notificationStatus" class="form-control" name="cmbStatus"
			              required>
			              @if($notification->notificationStatus)
			                 <option value="1" selected>ACTIVE</option>
			                 <option value="0">INACTIVE</option>
			              @else
			                <option value="0" selected>INACTIVE</option>
			                <option value="1">ACTIVE</option>
			              @endif
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
					  <button class="btn btn-primary btn-md btn-round mb-2 " id="btnTagsDes" type="button">
		              	<i class="fi-xwpuxl-check"></i> Unselect all</button>
			          <button id="btnUpdateNotif" type="submit" class="btn btn-primary btn-block pb-2 pr-3 pl-3 ">
			            <i class="fi-xwsuxl-update"></i> Update
					  </button>
		            </div>
	            </div>
				
				<div class="row">
					<div class="col-12">
						<div class="form-group form-text ">
		                 <label for="txtMessage">Extra Info</label>
		                 <textarea class="form-control" id="txtMessage" name="txtMsg"
		                  rows="3" value="{{$notification->customMessage}}"></textarea>
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
					     	<button id="btnUpdateNotif" type="submit" class="btn btn-primary pb-2 pr-3 pl-3 mb-5">Update
					     	</button>
					   	</div>
				   </div>
				</div>	
		</form>
	</fieldset>

            <div class="container mb-2">
                <div class="alert alert-danger" role="alert">
                 <form action="{{route('notifications.delete', ['id'=>$notification->id])}}" method="post" accept-charset="utf-8">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="btnDeleteNotif"
                    class="btn btn-md btn-round btn-primary"><i class="fi-xnsuxl-trash-bin"></i> Delete </button>
                     <span class="ml-2"><strong>This action cannot be reverted.</strong> </span>
                 </form>

                </div>
            </div>


</div>

<x-alert entity="Notification" :operation="session('sOperation') != '' ? session('sOperation') : ''" field=""  />

@include('layouts/summernote')

<script src="{{asset('js/entitySearch.js')}}"></script>

@endsection