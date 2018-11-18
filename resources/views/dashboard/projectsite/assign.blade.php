@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Assign Project Site</h1></center>
  <form autocomplete="off" action="/projectsite/assign" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    {{ csrf_field() }}
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="user">User *</label>
          <select class="form-control" id="user" name="user" required>
            <option disabled selected value="">---Please select---</option>
              @foreach ($users as $user)
                <option value="{{ $user->staffID }}">{{ $user->staffID }}   ||   {{ $user->userID }}   </option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="projectSites">Project Sites *</label>
          <select class="form-control" id="projectSites" name="projectSites" required>
            <option disabled selected value="">---Please select---</option>
              @foreach ($sites as $site)
                <option value="{{ $site->siteID }}">{{ $site->projectName }}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="startDate">Start Date *</label>
          <input type="date" class="form-control" name="startDate" id="startDate" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="endDate">End Date *</label>
          <input type="date" class="form-control" name="endDate" id="endDate" required>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="jobDescription">Job Description *</label>
          <input type="text" class="form-control" name="jobDescription" id="jobDescription" required>
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Submit</button>
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
            <th data-sortable="true">ID</th>
            <th data-sortable="true">Staff ID</th>
            <th data-sortable="true">Site ID</th>
            <th data-sortable="true">Start Date</th>
            <th data-sortable="true">End Date</th>
            <th data-sortable="true">Job Descrition</th>
            <th data-sortable="true">Job Status</th>
            <th data-sortable="true">Time Assigned</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($allAssign as $assign)

            <tr>
              <td>{{ $assign->id }}</td>
              <td>{{ $assign->staffID }}</td>
              <td>{{ $assign->siteID }}</td>
              <td>{{ $assign->startDate }}</td>
              <td>{{ $assign->endDate }}</td>
              <td>{{ $assign->jobDescription }}</td>
              <td>{{ $assign->jobStatus }}</td>
              <td>{{ $assign->created_at->diffForHumans() }}</td>
              <td>
                <div class="form-group" style="margin-bottom: -8px;">
                  <a href="/projectsite/assign/{{ $assign->id }}" class="btn btn-primary"  style="padding-top: 3px; padding-bottom: 3px; padding-left: 8px; padding-right: 8px;">Edit</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>

@endsection
