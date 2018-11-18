@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Manage Service - {{ $find->maintenanceID }}</h1></center>
  <br>

  <div class="row">
    <form autocomplete="off" action="/asset/service/{{ $find->maintenanceID }}" method="post" style="width: 90%; margin-left: auto; margin-right: auto;">
      @csrf
      <div class="row" style="margin-left:auto; margin-right: auto;">
        <div class="col-md-3">
          <div class="form-group">
            <label for="serviceCompanyID">Service Company ID *</label>
            <select class="form-control" id="serviceCompanyID" name="serviceCompanyID" required value="{{ $find->serviceCompanyID }}">
              @foreach ($services as $service)
                <option value="{{ $service->serviceCompanyID }}">{{ $service->serviceCompanyName }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="serviceDateTime">Service Date Time *</label>
            <input class="form-control" id="serviceDateTime" type="datetime-local" name="serviceDateTime" required value="{{ $find->serviceDateTime }}">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="maintenancePeriod">Maintenance Period(months) *</label>
            <input type="text" class="form-control" name="maintenancePeriod" id="maintenancePeriod" required value="{{ $find->maintenancePeriod }}">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="serviceDescription">Service Description *</label>
            <input type="text" class="form-control" name="serviceDescription" id="serviceDescription" required value="{{ $find->serviceDescription }}">
          </div>
        </div>
      </div>

      <div class="row" style="margin-left:auto; margin-right: auto;">
        <div class="col-md-3">
          <div class="form-group">
            <label for="nextServiceDate">Next Service Date</label>
            <input type="date" class="form-control" name="nextServiceDate" id="nextServiceDate" value="{{ $find->nextServiceDate }}">
          </div>
        </div>
        <div class="col-md-1" style="margin-top: 25px;">
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Update</button>
          </div>
        </div>
        <div class="col-md-1" style="margin-top: 25px;">
          <div class="form-group">
            <a class="btn btn-primary" href="/asset/service">Manage Service Company</a>
          </div>
        </div>
        <div class="col-md-1" style="margin-top: 25px; margin-left: 200px">
          <div class="form-group">
            <a href="/asset/{{ $find->assetID }}/edit" class="btn btn-primary">Back</a>
          </div>
        </div>
      </div>
    </form>
  </div>


@endsection
