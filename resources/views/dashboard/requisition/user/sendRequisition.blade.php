@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Submit Requisition</h1></center>
  <form autocomplete="off" action="/requisition" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    @csrf
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="asset">Asset *</label>
          <select class="form-control" id="asset" name="asset" required>
            <option disabled selected value="">---Please select---</option>
              @foreach ($assets as $asset)
                <option value="{{ $asset->assetID }}">{{ $asset->assetName }}   ||   {{ $asset->currentStatus }}   </option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="site">Site *</label>
          <select class="form-control" id="site" name="site" required>
            <option disabled selected value="">---Please select---</option>
              @foreach ($sites as $site)
                <option value="{{ $site->siteID }}">{{ $site->projectName }}   ||   {{ $site->purpose }}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="purpose">Purpose *</label>
          <input type="text" class="form-control" name="purpose" id="purpose" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="rentalDateTime">Rental Date Time *</label>
          <input type="datetime-local" class="form-control" name="rentalDateTime" id="rentalDateTime" required>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="returnDateTime">Return Date Time *</label>
          <input type="datetime-local" class="form-control" name="returnDateTime" id="returnDateTime" required>
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

@endsection
