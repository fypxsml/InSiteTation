@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">QR Code for <b>{{ $find->assetID }}</b></h1></center>

  <div class="container" style="margin-left: auto; margin-right: auto;">
    <div class="content">
      <center>{!! QrCode::size(500)->generate($find->assetID) !!}</center>
    </div>

    <br>

    <center><a href="/asset/generate" class="btn btn-primary">Generate Other</a><center>
  </div>




@endsection
