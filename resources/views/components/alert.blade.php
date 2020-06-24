<div>

	@switch($operation)

		@case('nSuc')
		  <div class="container">
		    <div class="alert alert-success" role="alert">
		     {{$entity}} added successfully.
		    </div>
		 </div>
		@break

		@case('nErr')
		  <div class="container">
		    <div class="alert alert-danger" role="alert">
		     {{$field}} already in use.
		    </div>
		 </div>
		 @break
		 
		 @case('uSuc')
		  <div class="container">
		    <div class="alert alert-success" role="alert">
		     {{$entity}} updated successfully.
		    </div>
		 </div>
		@break

		@case('uErr')
		  <div class="container">
		    <div class="alert alert-danger" role="alert">
		     {{$field}} already in use.
		  </div>
		 </div>
		@break

		@case('dSuc')
		  <div class="container">
		    <div class="alert alert-success" role="alert">
		     {{$entity}} deleted successfully.
		    </div>
		 </div>
		@break

		@case('dErr')
		  <div class="container">
		    <div class="alert alert-danger" role="alert">
		     Something wrong happened.
		    </div>
		 </div>
		@break

		@default
		@break


	@endswitch



</div>