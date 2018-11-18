@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Location History </h1></center>
  <hr>

  <center><h2>Asset ID: {{$aID}}</h2></center>

  <div class="box-body">
    <table data-toggle="table"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       id="table">
      <thead>
        <tr>
          <th data-sortable="true">Requisition ID</th>
          <th data-sortable="true">Staff ID</th>
          <th data-sortable="true">Rental Purpose</th>
          <th data-sortable="true">Rental Date Time</th>
          <th data-sortable="true">Return Date Time</th>
          <th data-sortable="true">Approved On</th>
          <th data-sortable="true">Rental Status</th>
          <th data-sortable="true">Longitude</th>
          <th data-sortable="true">Latitude</th>
          <th data-sortable="true">Update Date Time</th>
        </tr>
      </thead>
      <tbody>

        @foreach($locations as $location)
          <tr>
            <td>{{ $location->requisitionID }}</td>
            <td>{{ $location->staffID }}</td>
            <td>{{ $location->requisitionPurpose }}</td>
            <td>{{ $location->rentalDateTime }}</td>
            <td>{{ $location->returnDateTime }}</td>
            <td>{{ $location->created_at }}</td>
            <td>{{ $location->rentalStatus }}</td>
            <td>{{ $location->longitude }}</td>
            <td>{{ $location->latitude }}</td>
            <td>{{ $location->created_at }}</td>
          </tr>
        @endforeach

      </tbody>
    </table>

    <div class="row" style=" width: 90%; margin-left: auto; margin-right: auto">
      <a href="/requisition/history/asset" class="btn btn-primary">Back</a>
    </div>


  </div>
@endsection
