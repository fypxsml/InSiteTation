@extends ('dashboard.layouts.master')

@section ('content')

<center><h1 class="display-1">Manage Insurance - {{ $find->insuranceID }}</h1></center>

<div class="row">

<br>
  <form autocomplete="off" action="/asset/insurance/{{ $find->insuranceID }}" method="post" style="width: 90%; margin-left: auto; margin-right: auto">
    @csrf
    <h1 class="heading" style="padding-left: 15px;">Insurance</h1>
    <br>
    <div class="col-md-2">
      <div class="form-group">
        <label for="insuranceCompanyID">Insurance Company ID *</label>
        <select class="form-control" id="insuranceCompanyID" name="insuranceCompanyID" required value="{{ $find->insuranceCompanyID }}">
          @foreach ($insurances as $insurance)
            <option value="{{ $insurance->insuranceCompanyID }}">{{ $insurance->insuranceCompanyName }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="previousExpDate">Previous Expiry Date *</label>
        <input type="date" class="form-control" name="previousExpDate" id="previousExpDate" required value="{{ $find->previousExpDate }}">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="currentExpDate">Current Expiry Date *</label>
        <input type="date" class="form-control" name="currentExpDate" id="currentExpDate" required value="{{ $find->currentExpDate }}">
      </div>
    </div>
    <div class="col-md-1" style="margin-top: 25px;">
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Update</button>
      </div>
    </div>
    <div class="col-md-1" style="margin-top: 25px;">
      <div class="form-group">
        <a href="/asset/insurance" class="btn btn-primary">Manage Insurance Company</a>
      </div>
    </div>
    <div class="col-md-1" style="margin-top: 25px; margin-left: 200px">
      <div class="form-group">
        <a href="/asset/{{ $find->assetID }}/edit" class="btn btn-primary">Back</a>
      </div>
    </div>


  </form>

</div>

@endsection
