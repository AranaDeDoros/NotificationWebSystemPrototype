@extends('layouts.general')
@section('content')

<div class="container">
	<fieldset class="form-group">
		<legend> EDIT NOTIFICATION </legend>
		<form method="POST" action="{{route('notifications.update', ['id'=>1])}}">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col">
						<label for="notifTypes form-text ">Type</label>
				  		<select id="notifTypes" class="form-control" name="cmbNotifTypes"
				  		required>
				             <option value="">tipo</option>}
						</select>			
					</div>
					<div class="col">
						<label for="groupAdd form-text ">Group</label>
				  		<select id="groupAdd" class="form-control" name="cmbGroups"
				  		required>
				             <option value="">tipo</option>}
						</select>		
					</div>
					<div class="col">
						<label for="scheduleTypes form-text ">Schedule</label>
				  		<select id="scheduleTypes" class="form-control" name="cmbSchedules"
				  		required>
				             <option value="">tipo</option>
						</select>			
					</div>
				</div>
				AGREGAR CAMPO PARA INFO ADICIONAL?
				<div class="row">
					<div class="col-12">
						<div class="form-group form-text ">
		                 <label for="txtMessage">Extra Info</label>
		                 <textarea class="form-control" id="txtMessage" rows="3" required></textarea>
	  				</div>
					</div>
				</div>

			    <div class="form-group">
				   <div class="row">
					   	<div class="col-8">
					   		 <label for="inptAttachment form-text ">Attachment</label>
					    	<input type="file" class="form-control-file" id="inptAttachment">
						</div>
					    <div class="col-4">
					     	<button id="btnUpdateNotif" type="submit" class="btn btn-primary pb-2 pr-3 pl-3 mb-5">Update
					     	</button>
					   	</div>
				   </div>
				</div>	

			 

		</form>
	</fieldset>
</div>

@endsection