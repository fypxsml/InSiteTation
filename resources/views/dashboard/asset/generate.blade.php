@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Generate QR Code</h1></center>

  <div class="container">
    <form autocomplete="off" action="/asset/generate/qrcode" method="POST">
      @csrf
      <div class="form-group">
        <label for="asset">Asset *</label>
        <select class="form-control" id="asset" name="asset" required>
          <option disabled selected value="">---Please select---</option>
            @foreach ($allassets as $asset)
              <option value="{{ $asset->assetID }}">{{ $asset->assetID}} || {{ $asset->assetName }}   ||   {{ $asset->currentStatus }}   </option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Generate</button>
      </div>
    </form>
  </div>

  <p id="value"></p>





@endsection
