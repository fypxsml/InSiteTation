@extends ('dashboard.layouts.master')

@section ('content')
  <!--display all pending registration-->
  <center><h1 class="display-1">Pending Registration</h1></center>
  <hr>

  <div class="box-body">
    @include('dashboard.layouts.error')
    <table data-toggle="table"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       id="table">
      <thead>
        <tr>
          <th data-sortable="true">First Name</th>
          <th data-sortable="true">Last Name</th>
          <th data-sortable="true">Staff ID</th>
          <th data-sortable="true">User ID</th>
          <th data-sortable="true">Email</th>
          <th data-sortable="true">Submitted On</th>
          <th>Remarks (For Reject)</th>
          <th>Access Level (For Approve)</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pgUsers as $pgUser)
        <tr>
          <td>{{ $pgUser-> fname }}</td>
          <td>{{ $pgUser-> lname }}</td>
          <td>{{ $pgUser-> staffID }}</td>
          <td>{{ $pgUser-> userID }}</td>
          <td>{{ $pgUser-> email }}</td>
          <td>{{ $pgUser-> created_at->diffForHumans() }}</td>
          <td>
            <form autocomplete="off" action="/register/{{ $pgUser->id }}/reject" method="POST" id="rejectForm">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Reason rejected" style="width: 200px;">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-danger" id="rejectSubmit" >Reject</button>
              </div>
            </form>
          </td>

          <td>
            <form autocomplete="off" action="/register/{{ $pgUser->id }}/approve" method="POST" id="approveForm">
              @csrf
              <div class="form-group">
                <select class="custom-select" name="roleID" id="roleID" >
                 <option disabled selected value="">---Please select---</option>
                 <option value="1">Admin</option>
                 <option value="2">Manager</option>
                 <option value="3">Staff</option>
               </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" id="approveSubmit" >Approve</button>
              </div>
            </form>
          </td>

        </tr>
        @endforeach
      </tbody>


    </table>


@endsection
