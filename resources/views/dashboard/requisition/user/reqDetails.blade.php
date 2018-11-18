@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Requisition Details</h1></center>
  <hr>
  <center><h2>Requisition ID: {{ $requisition->requisitionID }}</h2></center>

  <div class="container">
    <ul class="list-inline">
      <li class="list-inline-item" style="font-size: 20px; padding: 10px;"><strong>Asset ID:</strong> {{ $requisition->assetID }}</li>
      <li class="list-inline-item" style="font-size: 20px; padding: 10px;"><strong>Site ID:</strong> {{ $requisition->siteID }}</li>
      <li class="list-inline-item" style="font-size: 20px; padding: 10px;"><strong>Rental Purpose:</strong> {{ $requisition->requisitionPurpose }}</li>
    </ul>
    <ul class="list-inline">
      <li class="list-inline-item" style="font-size: 20px; padding: 10px;"><strong>Rental Date Time:</strong> {{ $requisition->rentalDateTime }}</li>
      <li class="list-inline-item" style="font-size: 20px; padding: 10px;"><strong>Return Date Time:</strong> {{ $requisition->returnDateTime }}</li>
      <li class="list-inline-item" style="font-size: 20px; padding: 10px;"><strong>Approved On:</strong> {{ $requisition->created_at }}</li>
    </ul>
    <ul class="list-inline">
      <li class="list-inline-item" style="font-size: 20px; padding: 10px;"><strong>Status:</strong> {{ $requisition->rentalStatus }}</li>
      <li class="list-inline-item" style="font-size: 20px; padding: 10px;"><strong>Remarks:</strong> {{ $requisition->remarks}}</li>
    </ul>

  </div>

  <hr>

  <div class="box-body">
    <table data-toggle="table"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       id="table">
      <thead>
        <tr>
          <th data-sortable="true">Update Date Time</th>
          <th data-sortable="true">Longitude</th>
          <th data-sortable="true">Latitude</th>
        </tr>
      </thead>
      <tbody>
        @foreach($locations as $location)
          <tr>
            <td>{{ $location->updated_at }}</td>
            <td>{{ $location->longitude }}</td>
            <td>{{ $location->latitude }}</td>
          </tr>
        @endforeach

      </tbody>
    </table>

  </div>

  <br>

  <div class="row" style=" width: 90%; margin-left: auto; margin-right: auto">
    <a href="/requisition/history/all" class="btn btn-primary">Back</a>
  </div>
@endsection
