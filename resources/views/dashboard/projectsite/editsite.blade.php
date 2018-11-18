@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Manage Project Site - {{ $find->projectName }}</h1></center>
  <form autocomplete="off" action="/projectsite/{{ $find->siteID }}/edit" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    @csrf
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="projectName">Project Name</label>
          <input type="text" class="form-control" name="projectName" id="projectName" value="{{ $find->projectName }}" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="purpose">Purpose</label>
          <input type="text" class="form-control" name="purpose" id="purpose" value="{{ $find->purpose }}" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="companyHandled">Company Handled</label>
          <input type="text" class="form-control" name="companyHandled" id="companyHandled" value="{{ $find->companyHandled }}" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="address">Site Address</label>
          <input type="text" class="form-control" name="address" id="address" value="{{ $find->address }}" required>
        </div>
      </div>
    </div>

    <br>

    <div class="row">
      <div class="col-md-2">
        <div class="form-group">
          <label for="longitude">Longitude</label>
          <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $find->longitude }}" required>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="latitude">Latitude</label>
          <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $find->latitude }}" required>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" id="status" name="status" onchange="remarksdisplay();" value="{{ $find-> status }}" required>
            <option value="On-going">On-going</option>
            <option value="Cancelled">Cancelled</option>
            <option value="End">End</option>
          </select>
        </div>
      </div>
      <div class="col-md-3" id="remarkbox">
        <div class="form-group">
          <label for="remark">Remarks</label>
          <input type="text" class="form-control" name="remark" id="remark" value="{{ $find->remarks }}" disabled>
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <button class="btn btn-primary" type="submit" name="add" value="add">Save</button>
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <a class="btn btn-primary" href="/projectsite">Cancel</a>
        </div>
      </div>
    </div>
    @include('dashboard.layouts.error')
  </form>

  <script>
    function remarksdisplay()
    {
      if(document.getElementById('status').value == "Cancelled")
      {
          document.getElementById('remark').disabled = false;
          document.getElementById('remark').required = true;
      }

      else
      {
          document.getElementById('remark').disabled = true;
      }
    }
  </script>
@endsection
