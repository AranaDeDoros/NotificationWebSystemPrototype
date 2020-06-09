@elseif(session('nErr'))
  <div class="container">
    <div class="alert alert-danger" role="alert">
     Groupname already in use.
    </div>
  </div>
@endif


@if(session('dSuc'))
  <div class="container">
    <div class="alert alert-success" role="alert">
     Deleted successfully.
    </div>
  </div>
@elseif(session('dErr'))
  <div class="container">
    <div class="alert alert-danger" role="alert">
     Something went wrong.
    </div>
  </div>
@endif

@if(session('uSuc'))
  <div class="container">
    <div class="alert alert-success" role="alert">
     Updated successfully.
    </div>
  </div>
@elseif(session('uErr'))
  <div class="container">
    <div class="alert alert-danger" role="alert">
     Groupname already in use.
    </div>
  </div>
@endif