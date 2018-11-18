@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Manage Project Site</h1></center>
  <form autocomplete="off" action="/projectsite" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    @csrf
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="projectName">Project Name</label>
          <input type="text" class="form-control" name="projectName" id="projectName" value="{{ old('projectName') }}" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="purpose">Purpose</label>
          <input type="text" class="form-control" name="purpose" id="purpose" value="{{ old('purpose') }}" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="companyHandled">Company Handled</label>
          <input type="text" class="form-control" name="companyHandled" id="companyHandled" value="{{ old('companyHandled') }}" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="address">Site Address</label>
          <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" required>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-2">
        <div class="form-group">
          <label for="longitude">Longitude</label>
          <input type="text" class="form-control" name="longitude" id="longitude" value="{{ old('longitude') }}" required>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="latitude">Latitude</label>
          <input type="text" class="form-control" name="latitude" id="latitude" value="{{ old('latitude') }}" required>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" id="status" name="status" onchange="remarksdisplay();" required>
            <option value="On-Going">On-Going</option>
            <option value="Cancelled">Cancelled</option>
            <option value="End">End</option>
          </select>
        </div>
      </div>
      <div class="col-md-3" id="remarkbox" style="display:none;">
        <div class="form-group">
          <label for="remark">Remarks</label>
          <input type="text" class="form-control" name="remark" id="remark">
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <button class="btn btn-primary" type="submit" name="add" value="add">Add</button>
        </div>
      </div>
    </div>
    @include('dashboard.layouts.error')
  </form>

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
                <div class="form-group" style="margin-top: -2px; margin-bottom: -3px;">
                  <a href="/projectsite/{{ $site->siteID }}/edit" class="btn btn-primary"  style="padding-top: 1px; padding-bottom: 0px; padding-left: 9px; padding-right: 9px;">Edit</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
  <script>
    function remarksdisplay()
    {
      if(document.getElementById("status").value == "On-going")
      {
          document.getElementById('remarkbox').style.display = "none";
          document.getElementById('remark').required = false;
      }

      if(document.getElementById("status").value == "Cancelled")
      {
          document.getElementById('remarkbox').style.display = "block";
          document.getElementById('remark').required = true;
      }
    }
  </script>
@endsection
