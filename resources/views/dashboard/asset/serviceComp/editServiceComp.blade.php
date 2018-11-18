@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Edit Service Company</h1></center>
  <hr>

  <form autocomplete="off" action="/asset/service/manage/{{ $findComp->serviceCompanyID }}" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    {{ csrf_field() }}
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="serviceCompanyName">Service Company Name</label>
          <input type="text" class="form-control" name="serviceCompanyName" id="serviceCompanyName" value="{{ $findComp-> serviceCompanyName }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="companyAddress">Company Address</label>
          <input type="text" class="form-control" name="companyAddress" id="companyAddress" value="{{ $findComp-> companyAddress }}">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="companyContact">Company Contact</label>
          <input type="text" class="form-control" name="companyContact" id="companyContact" value="{{ $findComp-> companyContact }}">
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <button class="btn btn-primary" type="submit" name="save" value="save">Save</button>
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <a class="btn btn-primary" href="/asset/service">Cancel</a>
        </div>
      </div>
    </div>

    @include('dashboard.layouts.error')
  </form>


  @endsection
