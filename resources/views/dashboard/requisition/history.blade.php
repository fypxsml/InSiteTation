@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Requisition History</h1></center>
  <hr>

  <div class="box-body">
    <table data-toggle="table"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       id="table">
      <thead>
        <tr>
          <th data-sortable="true">Asset ID</th>
          <th data-sortable="true">Site ID</th>
          <th data-sortable="true">Rental Purpose</th>
          <th data-sortable="true">Rental Date Time</th>
          <th data-sortable="true">Return Date Time</th>
          <th data-sortable="true">Approved On</th>
          <th data-sortable="true">Status</th>
          <th>Remarks</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach($requisitions as $requisition)
          <tr>
            <td>{{ $requisition->assetID }}</td>
            <td>{{ $requisition->siteID }}</td>
            <td>{{ $requisition->requisitionPurpose }}</td>
            <td>{{ $requisition->rentalDateTime }}</td>
            <td>{{ $requisition->returnDateTime }}</td>
            <td>{{ $requisition->created_at }}</td>
            <td>{{ $requisition->rentalStatus }}</td>
            <td>{{ $requisition->remarks}}</td>
            <td>
              <a class="btn btn-primary" href="/requisition/history/{{$requisition->requisitionID}}/detail">View</a>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>

    @include('dashboard.layouts.error')

  </div>
@endsection
