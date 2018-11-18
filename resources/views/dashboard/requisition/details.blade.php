@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Requisition Details - {{ $requisition->requisitionID }}</h1></center>
  <hr>

  <div class="content" style="width: 95%; margin-left: auto; margin-right: auto;">
    <div class="row">
      <div class="col-md-3">
        <h4><b>Staff ID: </b>{{ $requisition->staffID }}</h4>
      </div>
      <div class="col-md-3">
        <h4><b>Asset ID: </b>{{ $requisition->assetID }}</h4>
      </div>
      <div class="col-md-4">
        <h4><b>Asset Name: </b>{{ $requisition->assetName }}</h4>
      </div>
      <div class="col-md-2">
        <h4><b>Site ID: </b>{{ $requisition->siteID }}</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <h4><b>Project Name: </b>{{ $requisition->projectName }}</h4>
      </div>
      <div class="col-md-4">
        <h4><b>Project Purpose: </b>{{ $requisition->purpose }}</h4>
      </div>
      <div class="col-md-4">
        <h4><b>Rental Purpose: </b>{{ $requisition->requisitionPurpose }}</h4>
      </div>

    </div>
    <div class="row">
      <div class="col-md-4">
        <h4><b>Rental Date Time: </b>{{ $requisition->rentalDateTime }}</h4>
      </div>
      <div class="col-md-4">
        <h4><b>Return Date Time: </b>{{ $requisition->returnDateTime }}</h4>
      </div>
      <div class="col-md-4">
        <h4><b>Approved On: </b>{{ $requisition->created_at }}</h4>
      </div>

    </div>

    <div class="row" style="margin-top: 20px">
      <div class="col-md-2" style="margin-top: 20px">
        <button id="cancelledbtn" class="btn btn-danger" onClick="cancelReq();">Cancelled</button>
      </div>
      <div class="row">
        <div id="cancelBox" style="display: none">
          <form autocomplete="off" action="/requisition/{{ $requisition->requisitionID }}/cancel" method="POST">
            @csrf
            <div class="col-md-4">
              <label for="ReasonsInput">Reasons for Cancel *</label>
              <div class="form-group" >
                <input type="text" class="form-control" name="ReasonsInput" id="ReasonsInput" placeholder="Reasons" required>
              </div>
            </div>
            <div class="col-md-1" style="margin-top: 20px">
              <div class="form-group">
                <button type="submit" class="btn btn-primary" id="statusSubmit">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

    <div class="row" style="margin-top: 20px">
      <div class="col-md-2" style="margin-top: 20px">
        <button id="returnedbtn" class="btn btn-success" onClick="returnReq();">Returned</button>
      </div>
      <div class="row">
        <div id="returnBox" style="display: none">
          <form autocomplete="off" action="/requisition/{{ $requisition->requisitionID }}/return" method="POST">
            @csrf

            <div class="col-md-4">
              <label for="RemarksInput">Remarks for Return (If any)</label>
              <div class="form-group" >
                <input type="text" class="form-control" name="RemarksInput" id="RemarksInput" placeholder="Remarks">
              </div>
            </div>
            <div class="col-md-1" style="margin-top: 20px">
              <div class="form-group">
                <button type="submit" class="btn btn-primary" id="statusSubmit">Submit</button>
              </div>
            </div>

            </div>
          </form>
        </div>
      </div>
    </div>


  <div class="box-body">
    <table data-toggle="table"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       id="table">
      <thead>
        <tr>
          <th data-sortable="true">Update Date Time</th>
          <th data-sortable="true">Longitude</th>
          <th data-sortable="true">Latitude</th>
        </tr>
      </thead>
      <tbody>

        @foreach($locations as $location)
          <tr>
            <td>{{ $location->created_at->toDayDateTimeString() }}</td>
            <td>{{ $location->longitude }}</td>
            <td>{{ $location->latitude }}</td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>

  <br>

  <div class="row" style=" width: 90%; margin-left: auto; margin-right: auto">
    <a href="/requisition/ongoing" class="btn btn-primary">Back</a>
  </div>

    <script>
      function cancelReq()
      {
        document.getElementById('ReasonsInput').required = true;
        document.getElementById('cancelBox').style.display = "inline";
        document.getElementById('returnBox').style.display = "none";
      }

      function returnReq()
      {
        document.getElementById('RemarksInput').required = false;
        document.getElementById('cancelBox').style.display = "none";
        document.getElementById('returnBox').style.display = "inline";
      }

    </script>
  </div>
@endsection
