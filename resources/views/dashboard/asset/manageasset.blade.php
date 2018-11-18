@extends ('dashboard.layouts.master')

@section ('content')

  <style>
    hr {
      border: 0;
      clear:both;
      display:block;
      width: 100%;
      background-color:#C0C0C0;
      height: 2px;
    }
  </style>

  <center><h1 class="display-1">Manage Asset - {{ $find->assetName }}</h1></center>
  <br>
  <div class="row">
    <form autocomplete="off" action="/asset/{{ $find->assetID }}/edit" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;" id="editform">
      {{ csrf_field() }}
      @include('dashboard.layouts.error')
      <br>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="assetName">Asset Name *</label>
            <input type="text" class="form-control" name="assetName" id="assetName" value="{{ $find->assetName }}" required disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="subcategory">Subcategory *</label>
            <select class="form-control" id="subcategory" name="subcategory" value="{{ $find->subcategoryName }}" required disabled>
              @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->subcategoryID }}">{{ $subcategory->subcategoryName }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="purchasedValue">Purchased Value</label>
            <input type="text" class="form-control" name="purchasedValue" id="purchasedValue" value="{{ $find->purchasedValue }}" disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="netWorthValue">Net Worth Value</label>
            <input type="text" class="form-control" name="netWorthValue" id="netWorthValue" value="{{ $find->netWorthValue }}" disabled>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="roadTaxValue">Road Tax Value</label>
            <input type="text" class="form-control" name="roadTaxValue" id="roadTaxValue" value="{{ $find->roadTaxValue }}" disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" id="brand" value="{{ $find->brand }}" disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" id="model" value="{{ $find->model }}" disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="carplate">Car Plate</label>
            <input type="text" class="form-control" name="carplate" value="{{ $find->carPlate }}" id="carplate" disabled>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="colour">Colour</label>
            <input type="text" class="form-control" name="colour" id="colour" value="{{ $find->colour }}" disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="supplier">Supplier</label>
            <input type="text" class="form-control" name="supplier" id="supplier" value="{{ $find->supplier }}" disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="datePurchased">Date Purchased</label>
            <input type="date" class="form-control" name="datePurchased" id="datePurchased" value="{{ $find->datePurchased }}" disabled>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-1 text-center" style="margin-top: 25px;">
          <div class="form-group">
            <a class="btn btn-warning" id="editBtn" name="editBtn" value="edit" onClick="ableAll()">Edit</a>
          </div>
        </div>
        <div class="col-md-1 text-center" style="margin-top: 25px;">
          <div class="form-group">
            <a href="/asset" class="btn btn-primary" id="backBtn" name="back" value="back">Back</a>
          </div>
        </div>
        <div class="col-md-5 text-center" style="margin-top: 25px;">
          <div class="form-group">
            <button class="btn btn-success" type="submit" id="saveBtn" name="save" value="save" style="display: none; font-size: 18px;">Save</button>
          </div>
        </div>
        <div class="col-md-1 text-center" style="margin-top: 30px;">
          <div class="form-group">
            <a href="/asset/{{ $find->assetID }}/edit" class="btn btn-warning" id="cancelBtn" name="cancel" value="cancel" style="display: none; padding: 8px; font-size: 18px;" onclick="disableAll();">Cancel</a>
          </div>
        </div>
      </div>

    </form>
  </div>

  <div class="row" style="width: 90%;margin-left:auto; margin-right: auto; padding-bottom: 10px;">
    <form autocomplete="off" action="/asset/{{ $find->assetID }}/archive" method="post" >
      @csrf
      <div class="row">
      <div class="col-md-1 text-center" style="margin-left:-5px;padding-bottom: 15px; ">
        <div class="form-group">
          <button type="submit" class="btn btn-danger" id="archiveBtn" name="archive" value="archive">Archive</button>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="content" style="width: 90%;margin-left:auto; margin-right: auto;">
      <hr>
    <div class="row">
      <h1 class="heading" style="padding-left: 15px;">Insurance</h1>

      <div style="margin-left:auto; margin-right: auto;">
        <form autocomplete="off" action="/asset/insurance/{{ $find->assetID }}/add" method="post">
          @csrf
          <div class="col-md-2">
            <div class="form-group">
              <label for="insuranceCompanyID">Insurance Company ID *</label>
              <select class="form-control" id="insuranceCompanyID" name="insuranceCompanyID" required>
                <option disabled selected value="">---Please select---</option>
                @foreach ($insurances as $insurance)
                  <option value="{{ $insurance->insuranceCompanyID }}">{{ $insurance->insuranceCompanyName }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="previousExpDate">Previous Expiry Date *</label>
              <input type="date" class="form-control" name="previousExpDate" id="previousExpDate" value="{{ old('previousExpDate') }}" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="currentExpDate">Current Expiry Date *</label>
              <input type="date" class="form-control" name="currentExpDate" id="currentExpDate" value="{{ old('currentExpDate') }}" required>
            </div>
          </div>
          <div class="col-md-1" style="margin-top: 25px;">
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Add</button>
            </div>
          </div>
          <div class="col-md-1" style="margin-top: 25px;">
            <div class="form-group">
              <a class="btn btn-primary" href="/asset/insurance">Manage Insurance Company</a>
            </div>
          </div>
        </form>
      </div>
      <br>
      <div class="box-body" style="margin-top: 50px;">
        <table data-toggle="table"
           data-query-params="queryParams"
           data-pagination="true"
           data-search="true"
           id="table">
            <thead>
            <tr>
                <th data-sortable="true">Insurance ID</th>
                <th data-sortable="true">Insurance Company Name</th>
                <th data-sortable="true">Previous Expiry Date</th>
                <th data-sortable="true">Current Expiry Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach($findI as $ins)
                <tr>
                  <td>{{ $ins->insuranceID }}</td>
                  <td>{{ $ins->insuranceCompanyName }}</td>
                  <td>{{ $ins->previousExpDate }}</td>
                  <td>{{ $ins->currentExpDate }}</td>
                  <td>
                    <div class="form-group" style="margin-top: -2px; margin-bottom: -3px;">
                      <a href="/asset/insurance/{{ $ins->insuranceID }}" class="btn btn-primary"  style="padding-top: 1px; padding-bottom: 0px; padding-left: 9px; padding-right: 9px;">View More</a>
                    </div>
                  </td>
                <tr>
              @endforeach
            </tbody>
        </table>
      </div>

    </div>

    <hr>

    <div class="row" >
      <h1 class="heading" style="padding-left: 15px;">Maintenance</h1>

      <form autocomplete="off" action="/asset/service/{{ $find->assetID }}/add" method="post">
        @csrf
        <div class="row" style="margin-left:auto; margin-right: auto;">
          <div class="col-md-3">
            <div class="form-group">
              <label for="serviceCompanyID">Service Company ID *</label>
              <select class="form-control" id="serviceCompanyID" name="serviceCompanyID" required>
                <option disabled selected value="">---Please select---</option>
                @foreach ($services as $service)
                  <option value="{{ $service->serviceCompanyID }}">{{ $service->serviceCompanyName }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="serviceDateTime">Service Date Time *</label>
              <input class="form-control" id="serviceDateTime" type="datetime-local" name="serviceDateTime" value="{{ old('serviceDateTime') }}" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="maintenancePeriod">Maintenance Period(days) *</label>
              <input type="text" class="form-control" name="maintenancePeriod" id="maintenancePeriod" value="{{ old('maintenancePeriod') }}" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="serviceDescription">Service Description *</label>
              <input type="text" class="form-control" name="serviceDescription" id="serviceDescription" value="{{ old('serviceDescription') }}" required>
            </div>
          </div>
        </div>

        <div class="row" style="margin-left:auto; margin-right: auto;">
          <div class="col-md-3">
            <div class="form-group">
              <label for="nextServiceDate">Next Service Date</label>
              <input type="date" class="form-control" name="nextServiceDate" id="nextServiceDate" value="{{ old('nextServiceDate') }}">
            </div>
          </div>
          <div class="col-md-1" style="margin-top: 25px;">
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Add</button>
            </div>
          </div>
          <div class="col-md-1" style="margin-top: 25px;">
            <div class="form-group">
              <a class="btn btn-primary" href="/asset/service">Manage Service Company</a>
            </div>
          </div>
        </div>
      </form>

      <div class="box-body">
        <table data-toggle="table"
           data-query-params="queryParams"
           data-pagination="true"
           data-search="true"
           id="table">
            <thead>
            <tr>
                <th>Maintenance ID</th>
                <th>Service Company Name</th>
                <th>Service Description</th>
                <th>Service Date Time</th>
                <th>Next Service Date</th>
                <th>Maintenance Period (Days)</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach($findS as $service)
                <tr>
                  <td>{{ $service->maintenanceID }}</td>
                  <td>{{ $service->serviceCompanyName }}</td>
                  <td>{{ $service->serviceDescription }}</td>
                  <td>{{ $service->serviceDateTime }}</td>
                  <td>{{ $service->nextServiceDate }}</td>
                  <td>{{ $service->maintenancePeriod }}</td>
                  <td>
                    <div class="form-group" style="margin-top: -2px; margin-bottom: -3px;">
                      <a href="/asset/service/{{ $service->maintenanceID }}" class="btn btn-primary"  style="padding-top: 1px; padding-bottom: 0px; padding-left: 9px; padding-right: 9px;">View More</a>
                    </div>
                  </td>
                <tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>


  <script>
    function ableAll()
    {
      var form = document.getElementById("editform");
      var elements = form.elements;
      for(var i = 0, len = elements.length; i < len; ++i)
      {
        elements[i].disabled = false;
      }
      document.getElementById('editBtn').style.display = "none";
      document.getElementById('archiveBtn').style.display = "none";
      document.getElementById('backBtn').style.display = "none";

      document.getElementById('saveBtn').style.display = "inline";
      document.getElementById('cancelBtn').style.display = "inline";
    }
    function disableAll()
    {
      var form = document.getElementById("editform");
      var elements = form.elements;
      for(var i = 0, len = elements.length; i < len; ++i)
      {
        elements[i].disabled = true;
      }
      document.getElementById('editBtn').style.display = "inline";
      document.getElementById('archiveBtn').style.display = "inline";
      document.getElementById('saveBtn').style.display = "none";
      document.getElementById('cancelBtn').style.display = "none";
    }
  </script>

@endsection
