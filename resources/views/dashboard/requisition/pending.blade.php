@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Pending Requisition</h1></center>
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
          <th data-sortable="true">Staff ID</th>
          <th data-sortable="true">Asset ID</th>
          <th data-sortable="true">Asset Name</th>
          <th data-sortable="true">Asset Status</th>
          <th data-sortable="true">Site ID</th>
          <th data-sortable="true">Project Name</th>
          <th data-sortable="true">Project Purpose</th>
          <th data-sortable="true">Rental Purpose</th>
          <th data-sortable="true">Rental Date Time</th>
          <th data-sortable="true">Return Date Time</th>
          <th data-sortable="true">Submitted On</th>
          <th>Approve</th>
          <th>Reject</th>
          <th></th>

        </tr>
      </thead>
      <tbody>
        @foreach ($pendings as $pending)
        <tr>
          <td>{{ $pending-> staffID }}</td>
          <td>{{ $pending-> assetID }}</td>
          <td>{{ $pending-> assetName }}</td>
          <td>{{ $pending-> currentStatus }}</td>
          <td>{{ $pending-> siteID }}</td>
          <td>{{ $pending-> projectName }}</td>
          <td>{{ $pending-> purpose }}</td>
          <td>{{ $pending-> requisitionPurpose }}</td>
          <td>{{ $pending-> rentalDateTime }}</td>
          <td>{{ $pending-> returnDateTime }}</td>
<!--!!-->          <td>{{ $pending-> created_at }}</td>
          <td>
            <div class="row" style="width: 180px; margin-left: 5px">
                <a href="/requisition/{{ $pending->id }}/approve" id="approvebtn" class="btn btn-primary">Approve</a>

            </div>
          </td>


            <td>
              <form autocomplete="off" action="/requisition/{{ $pending->id }}/reject" method="POST">
                @csrf
              <div class="row" style="width: 300px; margin-left: 5px;">
                <div class="form-group" >
                  <input type="text" class="form-control" name="RemarksInput" id="RemarksInput" placeholder="Reject reason *" style="width: 200px;">
                </div>
                <div class="form-group" style="margin-left: 220px; margin-top: -50px">
                  <button type="submit" class="btn btn-danger" id="rejectSubmit" >Reject</button>
                </div>
              </div>
              </form>
            </td>

        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
@endsection
