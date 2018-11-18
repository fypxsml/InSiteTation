@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Manage Insurance Company</h1></center>
  <form autocomplete="off" action="/asset/insurance" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    {{ csrf_field() }}
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="insuranceCompanyName">Insurance Company Name</label>
          <input type="text" class="form-control" name="insuranceCompanyName" id="insuranceCompanyName">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="companyAddress">Company Address</label>
          <input type="text" class="form-control" name="companyAddress" id="companyAddress">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="companyContact">Company Contact</label>
          <input type="text" class="form-control" name="companyContact" id="companyContact">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="insuranceAgent">Agent Name</label>
          <input type="text" class="form-control" name="insuranceAgent" id="insuranceAgent">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="insuranceAgentContact">Agent Contact</label>
          <input type="text" class="form-control" name="insuranceAgentContact" id="insuranceAgentContact">
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
            <th data-sortable="true">Insurance Company ID</th>
            <th data-sortable="true">Company Name</th>
            <th data-sortable="true">Company Contact</th>
            <th data-sortable="true">Company Address</th>
            <th data-sortable="true">Insurance Agent</th>
            <th data-sortable="true">Insurance Agent Contact</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($companies as $company)
            <tr>
              <td>{{ $company-> insuranceCompanyID }}</td>
              <td>{{ $company-> insuranceCompanyName }}</td>
              <td>{{ $company-> companyContact }}</td>
              <td>{{ $company-> companyAddress }}</td>
              <td>{{ $company-> insuranceAgent }}</td>
              <td>{{ $company-> insuranceAgentContact }}</td>
              <td>
                <div class="form-group" style="margin-top: -2px; margin-bottom: -3px;">
                  <a href="/asset/insurance/manage/{{ $company->insuranceCompanyID }}" class="btn btn-primary" style="padding-top: 1px; padding-bottom: 0px; padding-left: 9px; padding-right: 9px;">Edit</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>

@endsection
