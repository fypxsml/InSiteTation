@extends ('dashboard.layouts.master')

@section ('content')

<center><h1 class="display-1">Requisition History Details</h1></center>
<br>
<div class="content" style="width: 95%; margin-left: auto; margin-right: auto;">
  <div class="row">
    <div class="col-md-3">
      <h4><b>Staff ID: </b>{{ $requisition->staffID }}</h4>
    </div>
    <div class="col-md-3">
      <h4><b>Asset ID: </b>{{ $requisition->assetID }}</h4>
    </div>
    <div class="col-md-4">
      <h4><b>Asset Name: </b>{{ $requisition->assetName }}</h4>
    </div>
    <div class="col-md-2">
      <h4><b>Site ID: </b>{{ $requisition->siteID }}</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <h4><b>Project Name: </b>{{ $requisition->projectName }}</h4>
    </div>
    <div class="col-md-4">
      <h4><b>Project Purpose: </b>{{ $requisition->purpose }}</h4>
    </div>
    <div class="col-md-4">
      <h4><b>Rental Purpose: </b>{{ $requisition->requisitionPurpose }}</h4>
    </div>

  </div>
  <div class="row">
    <div class="col-md-4">
      <h4><b>Rental Date Time: </b>{{ $requisition->rentalDateTime }}</h4>
    </div>
    <div class="col-md-4">
      <h4><b>Return Date Time: </b>{{ $requisition->returnDateTime }}</h4>
    </div>
    <div class="col-md-4">
      <h4><b>Approved On: </b>{{ $requisition->created_at }}</h4>
    </div>

  </div>

  <br>

  <h2 style="margin-top: 100px">Locations</h2>

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
            <td>{{ $location->created_at->toDayDateTimeString() }}</td>
            <td>{{ $location->longitude }}</td>
            <td>{{ $location->latitude }}</td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>

  <div class="row" style=" width: 90%; margin-left: auto; margin-right: auto">
    <a href="/requisition/history" class="btn btn-primary">Back</a>
  </div>

  @endsection
