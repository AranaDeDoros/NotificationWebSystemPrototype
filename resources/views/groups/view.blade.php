@extends('layouts.general')
@section('content')

<div class="container">
  <fieldset class="form-group">
    <legend> EDIT GROUP </legend>
    <form method="POST" action="{{route('groups.update', ['id'=> 1])}}">
        @csrf
        @method('PUT')
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
                     <option value="">tipo</option>
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
            <button id="btnUpdateGroup" type="submit" class="btn btn-primary btn-block pb-2 pr-3 pl-3 ">Update
            </button>
          </div>
        </div>

    </form>
  </fieldset>
</div>

@endsection