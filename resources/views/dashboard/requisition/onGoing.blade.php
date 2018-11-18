@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">On-Going Requisition</h1></center>
  <hr>

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
          <th data-sortable="true">Asset ID</th>
          <th data-sortable="true">Site ID</th>
          <th data-sortable="true">Rental Purpose</th>
          <th data-sortable="true">Rental Date Time</th>
          <th data-sortable="true">Return Date Time</th>
          <th data-sortable="true">Approved On</th>
          <th>Action</th>
          <th></th>

        </tr>
      </thead>
      <tbody>

        @foreach($ongoings as $ongoing)
          <tr>
            <td>{{ $ongoing->requisitionID }}</td>
            <td>{{ $ongoing->staffID }}</td>
            <td>{{ $ongoing->assetID }}</td>
            <td>{{ $ongoing->siteID }}</td>
            <td>{{ $ongoing->requisitionPurpose }}</td>
            <td>{{ $ongoing->rentalDateTime }}</td>
            <td>{{ $ongoing->returnDateTime }}</td>
            <td>{{ $ongoing->created_at->diffForHumans() }}</td>
            <td>
              <a href="/requisition/{{ $ongoing->requisitionID }}/details" class="btn btn-primary">View</a>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>

    @include('dashboard.layouts.error')

  </div>
@endsection
