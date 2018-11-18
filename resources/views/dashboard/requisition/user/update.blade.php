@extends ('dashboard.layouts.master')

@section ('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
<style>


      .qrcode-text-btn
      {
          display:inline-block;
          background:url(//dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg) 50% 50% no-repeat;
          height:80px;
          width:80px;
          margin-left: 100px;
          cursor:pointer
      }
      .qrcode-text-btn > input[type=file]
      {
          position:absolute;
          overflow:hidden;
          width:1px;
          height:1px;
          opacity:0
      }
      </style>

  <center><h1 class="display-1">Update Location</b></h1></center>

  @if ($flashMsg = session('update'))
  <div class="row">
    <div class="col-md-12 text-center">
        <div id="flash-message" class="alert alert-success alert-dismissible" style=" padding: 25px;">
          {{ $flashMsg }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>
  </div>
  @endif
  <body onload="getLocation();">

  <br>

  <form autocomplete="off" action="/requisition/updatelocation/{{ $find->requisitionID }}" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    {{ csrf_field() }}
    <div class="row">
    <h3 class="col-md-5">Click on the QR code to scan</h3>

{{--       <div class="col-md-3">
        <div class="form-group">
          <input type=text name="qrValue" size=16 class="qrcode-text form-control" id="qrValue" disabled required>
        </div>
      </div> --}}
      <div class="col-md-4">
        <div class="form-group">
          <label class=qrcode-text-btn><input class="form-control" type=file accept="image/*" capture=environment onclick="return showQRIntro();" onchange="openQRCamera(this);" tabindex=-1></label>
        </div>
      </div>
    </div>

{{--   <div class="row">
    <div class="col-md-3">
      <button class="btn btn-primary" type="button" name="button" onclick="getLocation()">Get Location</button>
    </div>
    <div class="col-md-3">
      <p id="location"></p>
    </div>
  </div> --}}

  {{-- <p id="demo"></p> --}}

{{--
    <p id="demo" value="demo"></p>
    <p id="demo2" value="demo2"></p> --}}
    <label for="purpose">QR Code Value</label>
    <input type="text" class="form-control" name="qrValue" id="qrValue">
    <label for="purpose">Latitude</label>
    <input type="text" class="form-control" name="lat" id="lat" >
    <label for="purpose">Longitude</label>
    <input type="text" class="form-control" name="long" id="long" >
    <p id="demo" value="demo"></p>


    <button class="btn btn-success" type="submit" name="updateLoc" value="updateLoc">Update Location</button>

    @include('dashboard.layouts.error')
  </form>

  <script type="text/javascript">

    function openQRCamera(node) {
      var reader = new FileReader();
      reader.onload = function() {
        node.value = "";
        qrcode.callback = function(res) {
          if(res instanceof Error)
          {
            alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
          } else
          {
            //node.parentNode.previousElementSibling.value = res;
            document.getElementById('qrValue').value = res;
          }
        };
        qrcode.decode(reader.result);
      };
      reader.readAsDataURL(node.files[0]);
    }

    function showQRIntro() {
      return confirm("Use your camera to take a picture of a QR code.");
    }

    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        document.getElementById("lat").value = position.coords.latitude;
        document.getElementById("long").value = position.coords.longitude;
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred."
                break;
        }
    }
</script>
@endsection
