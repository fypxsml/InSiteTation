@extends ('dashboard.layouts.master')

@section ('content')
<style>
    #mapid {
        height: 100%;
        width: 95%;
    }
</style>
  <center><h1 class="display-1">Asset Location Map </h1></center>
  <hr>

  <body onload="getLocation();">
  <div class="box-body" style="height: 600px;">
    <div id="mapid" style="border: 1px solid; margin-left: auto; margin-right: auto;"><center><p id="geolocation" style="font-size: 30px; padding: 10px; color: red;"></p></center></div>
  </div>

  <script>

      var x = document.getElementById("geolocation");

      function getLocation() {
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition, showError);
          } else {
              x.innerHTML = "Geolocation is not supported by this browser.";
          }
      }

      function showPosition(position) {
          showLocation(position);
      }

      window.onload = getLocation;

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

    <script type="text/javascript">

      function showLocation(position)
      {
          var mymap = L.map('mapid').setView([position.coords.latitude, position.coords.longitude], 12);
          // var mymap = L.map('mapid').setView([2.9588912, 101.76198410000006], 12);
          // var mymap = L.map('mapid').setView([1.5533, 110.3592], 8);

          L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZnlweHNtbCIsImEiOiJjam5sZ3N6czMwN2d0M3dvNTRvazdveWQ0In0.EiGlbzKgXuDjit4XnOwhcA', {
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          maxZoom: 19,
          id: 'mapbox.streets',
          accessToken: 'pk.eyJ1IjoiZnlweHNtbCIsImEiOiJjam5sZ3N6czMwN2d0M3dvNTRvazdveWQ0In0.EiGlbzKgXuDjit4XnOwhcA'
          }).addTo(mymap);


          var assets = {!! $locations !!};

          for(var i = 0, n = assets.length; i < n; i++)
          {
            var data = assets[i],
                lat = data.latitude,
                long = data.longitude,
                aID = data.assetID,
                sID = data.staffID,
                name = data.projectName

            var marker = L.marker([lat, long]).addTo(mymap);

            marker.bindPopup("<b>"+name+"</b><br><b>Asset ID: </b>"+aID+"<br><b>Staff ID: </b>"+sID);
          }

          var sites = {!! $sites !!};

          for (var i = 0, n = sites.length; i < n; i++)
          {
            var data = sites[i],
                lat = data.latitude,
                long = data.longitude
                name = data.projectName;

            var circle = L.circle([lat, long],
            {
                color: '#ffd25a',
                fillColor: '#fdfd96',
                fillOpacity: 0.6,
                radius: 1000
            }).addTo(mymap);

            circle.bindPopup(name);
          }


      }
    </script>

@endsection
