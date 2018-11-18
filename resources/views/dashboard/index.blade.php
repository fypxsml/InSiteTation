@extends ('dashboard.layouts.master')


@section ('content')
<head>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <style>
        #mapid {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
    <!-- Info boxes -->
    <div class="row">

      @if(Auth::user()->level() >= 2)
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-file-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">On-Going Requisition</span>
            <span class="info-box-number">{{ $analytics['allReq'] }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-fw fa-car"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Assets Available</span>
            <span class="info-box-number">{{ $analytics['allAssets'] }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-fw fa-map-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Sites</span>
            <span class="info-box-number">{{ $analytics['allSites'] }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Active Users</span>
            <span class="info-box-number">{{ $analytics['allUsers'] }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row" style="margin-left: auto; margin-right: auto">
      <div class="col-md-6 ml-auto">
        <div class="row">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Number Of Requisitions In Sites</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body">
                <div id="donut"></div>
              </div>
            <!-- /.box-body -->
            </div>
          </div>

        <div class="row" >
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Number Of Assets per Site</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar"></div>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
      </div>

      <div class="col-md-6 mr-auto">
        <body onload="getLocation();">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Map</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" style="height: 500px">
              <div id="mapid" style="border: 1px solid;"><center><p id="geolocation" style="font-size: 30px; padding: 10px; color: red;"></p></center></div>
            </div>
            <!-- /.box-body -->
          </div>

      </div>
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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
      <script>

      Morris.Donut({
        element: 'donut',
        resize: true,
        colors: ['#71B5F6','#CCB48E','#717D89','#A3CCE2','#C73F4B','#FCCEA7','#E16115'],
        data: {!!$donut!!}
      });

      Morris.Bar({
        element: 'bar',
        resize: true,
        barColors: ['#6180B3'],
        data: {!! $bar !!},
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Number of Assets']
      });

      </script>

<!--analytics for normal user in sublime -->
@elseif(Auth::user()->level() == 1)
          <div class="row" style="width: 95%; margin-left: auto; margin-right: auto;">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-fw fa-file-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Requisitions On Your Sites</span>
                  <span class="info-box-number">{{ $analytics['reqSites'] }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-fw fa-car"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Assets On Your Sites</span>
                  <span class="info-box-number">{{ $analytics['totalAssets'] }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-map-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Sites Handled</span>
                  <span class="info-box-number">{{ $analytics['sites'] }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
          </div>

          <div class="row" style="width: 95%; margin-left: auto; margin-right: auto">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Number Of Requisitions In Site Managed</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <div id="staffDonut"></div>
                </div>
              <!-- /.box-body -->
              </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Number Of Assets per Sites Managed</h3>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="box-body">
                      <div id="staffBar"></div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>
            </div>
          </div>

          <div class="row" style="width: 95%; margin-left: auto; margin-right: auto">
            <div class="row" style="width: 95%; margin-left: auto; margin-right: auto">
              <h1>Sites Assigned</h1>
              <br>
            </div>

            <div class="box-body">
              <table data-toggle="table"
                 data-query-params="queryParams"
                 data-pagination="true"
                 data-search="true"
                 id="table">
                <thead>
                  <tr>
                    <th data-sortable="true">Site ID</th>
                    <th data-sortable="true">Start Date</th>
                    <th data-sortable="true">End Date</th>
                    <th data-sortable="true">Job Desctiption</th>
                    <th data-sortable="true">Project Name</th>
                    <th data-sortable="true">Address</th>
                    <th data-sortable="true">Purpose</th>
                    <th data-sortable="true">Longitude</th>
                    <th data-sortable="true">Latitude</th>
                    <th data-sortable="true">Job Status</th>
                    <th data-sortable="true">Status</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($assigns as $assign)
                    <tr>
                      <td>{{ $assign->siteID }}</td>
                      <td>{{ $assign->startDate }}</td>
                      <td>{{ $assign->endDate }}</td>
                      <td>{{ $assign->jobDescription }}</td>
                      <td>{{ $assign->projectName }}</td>
                      <td>{{ $assign->address }}</td>
                      <td>{{ $assign->purpose }}</td>
                      <td>{{ $assign->longitude }}</td>
                      <td>{{ $assign->latitude }}</td>
                      <td>{{ $assign->jobStatus }}</td>
                      <td>{{ $assign->status }}</td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script>

        Morris.Donut({
          element: 'staffDonut',
          resize: true,
          colors: ['#71B5F6','#CCB48E','#717D89','#A3CCE2','#C73F4B','#FCCEA7','#E16115'],
          data: {!!$staffDonut!!}
        });

        Morris.Bar({
          element: 'staffBar',
          resize: true,
          barColors: ['#6180B3'],
          data: {!! $staffBar !!},
          xkey: 'y',
          ykeys: ['a'],
          labels: ['Number of Assets']
        });
        </script>
      @endif

    </div>
    <!-- /.row -->


@endsection
