@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Search Users</h1></center>

  <div class="box-body">
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
            <th data-sortable="true">Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)

            <tr>
              <td>{{ $user-> fname }}</td>
              <td>{{ $user-> lname }}</td>
              <td>{{ $user-> staffID }}</td>
              <td>{{ $user-> userID }}</td>
              <td>{{ $user-> status }}</td>
              <td>
                <a href="/user/{{ $user->staffID }}" class="btn btn-primary">View</a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>

@endsection
