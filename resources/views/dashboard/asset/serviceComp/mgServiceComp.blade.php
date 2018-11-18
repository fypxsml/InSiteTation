@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Manage Service Company</h1></center>
  <form autocomplete="off" action="/asset/service" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    {{ csrf_field() }}
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="serviceCompanyName">Service Company Name</label>
          <input type="text" class="form-control" name="serviceCompanyName" id="serviceCompanyName">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="companyAddress">Company Address</label>
          <input type="text" class="form-control" name="companyAddress" id="companyAddress">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="companyContact">Company Contact</label>
          <input type="text" class="form-control" name="companyContact" id="companyContact">
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
            <th data-sortable="true">Service Company ID</th>
            <th data-sortable="true">Company Name</th>
            <th data-sortable="true">Company Contact</th>
            <th data-sortable="true">Company Address</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($companies as $company)
            <tr>
              <td>{{ $company-> serviceCompanyID }}</td>
              <td>{{ $company-> serviceCompanyName }}</td>
              <td>{{ $company-> companyContact }}</td>
              <td>{{ $company-> companyAddress }}</td>
              <td>
                <div class="form-group" style="margin-top: -2px; margin-bottom: -3px;">
                  <a href="/asset/service/manage/{{ $company->serviceCompanyID }}" class="btn btn-primary"  style="padding-top: 1px; padding-bottom: 0px; padding-left: 9px; padding-right: 9px;">Edit</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>

@endsection
