@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Edit Assigned Project Site</h1></center>
  <form autocomplete="off" action="/projectsite/assign/{{ $find->id }}" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    @csrf
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="user">User *</label>
          <input type="text" class="form-control" name="user" id="user" required disabled value="{{ $find->staffID }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="projectSites">Project Sites *</label>
          <select class="form-control" id="projectSites" name="projectSites" required value="{{ $find->siteID }}">
              @foreach ($sites as $site)
                <option value="{{ $site->siteID }}">{{ $site->projectName }}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="startDate">Start Date *</label>
          <input type="date" class="form-control" name="startDate" id="startDate" required value="{{ $find->startDate }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="endDate">End Date *</label>
          <input type="date" class="form-control" name="endDate" id="endDate" required value="{{ $find->endDate }}">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="jobDescription">Job Description *</label>
          <input type="text" class="form-control" name="jobDescription" id="jobDescription" required value="{{ $find->jobDescription }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="status">Status *</label>
          <select class="form-control" id="status" name="status" onchange="reasondisplay();" required value="{{ $find->jobStatus }}">
            <option value="Active">Active</option>
            <option value="Cancelled">Cancelled</option>
            <option value="End">End</option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="reason">Reason</label>
          <input type="text" class="form-control" name="reason" id="reason" disabled>
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <a class="btn btn-primary" href="/projectsite/assign">Cancel</a>
        </div>
      </div>
    </div>

    @include('dashboard.layouts.error')
  </form>

  <script>
  function reasondisplay()
  {
    if(document.getElementById('status').value == "Cancelled")
    {
        document.getElementById('reason').disabled = false;
        document.getElementById('reason').required = true;
    }

    else
    {
        document.getElementById('reason').disabled = true;
    }
  }
  </script>
@endsection
