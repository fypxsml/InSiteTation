@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Search Project Sites</h1></center>

  <div class="box-body">
    <table data-toggle="table"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       id="table">
        <thead>
        <tr>
            <th data-sortable="true">Site ID</th>
            <th data-sortable="true">Project Name</th>
            <th data-sortable="true">Purpose</th>
            <th data-sortable="true">Company Handled</th>
            <th data-sortable="true">Site Address</th>
            <th data-sortable="true">Longitude</th>
            <th data-sortable="true">Latitude</th>
            <th data-sortable="true">Status</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($sites as $site)

            <tr>
              <td>{{ $site-> siteID }}</td>
              <td>{{ $site-> projectName }}</td>
              <td>{{ $site-> purpose }}</td>
              <td>{{ $site-> companyHandled }}</td>
              <td>{{ $site-> address }}</td>
              <td>{{ $site-> longitude }}</td>
              <td>{{ $site-> latitude }}</td>
              <td>{{ $site-> status }}</td>
              <td>{{ $site-> remarks }}</td>
              <td>
                <div class="form-group" style="margin-bottom: -8px;">
                  <a href="/projectsite/{{ $site->siteID }}/edit" class="btn btn-primary"  style="padding-top: 3px; padding-bottom: 3px; padding-left: 8px; padding-right: 8px;">Edit</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>

@endsection
