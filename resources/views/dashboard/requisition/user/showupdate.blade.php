@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Update Location</b></h1></center>

  <div class="box-body">
    <table data-toggle="table"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       id="table">
      <thead>
        <tr>
          <th data-sortable="true">Requisition ID</th>
          <th data-sortable="true">Asset ID</th>
          <th data-sortable="true">Rental Date Time</th>
          <th data-sortable="true">Return Date Time</th>
          <th data-sortable="true">Requisition Purpose</th>
          <th data-sortable="true">Site ID</th>
          <th>Remarks</th>
          <th data-sortable="true">Approved On</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($requisitions as $requisition)
          <tr>
            <td>{{ $requisition->requisitionID }}</td>
            <td>{{ $requisition->assetID }}</td>
            <td>{{ $requisition->rentalDateTime }}</td>
            <td>{{ $requisition->returnDateTime }}</td>
            <td>{{ $requisition->requisitionPurpose }}</td>
            <td>{{ $requisition->siteID }}</td>
            <td>{{ $requisition->remarks }}</td>
            <td>{{ $requisition->created_at }}</td>
            <td>
                <a href="/requisition/updatelocation/{{ $requisition->requisitionID }}" class="btn btn-primary">Update</a>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>

  </div>



@endsection
