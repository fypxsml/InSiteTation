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

  <center><h1 class="display-1">Add Asset</h1></center>
  <form autocomplete="off" action="/asset" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    {{ csrf_field() }}
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="assetName">Asset Name *</label>
          <input type="text" class="form-control" name="assetName" id="assetName" value="{{ old('assetName') }}" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="subcategory">Subcategory *</label>
          <select class="form-control" id="subcategory" name="subcategory" required>
            <option disabled selected value="">---Please select---</option>
            @foreach ($subcategories as $subcategory)
              <option value="{{ $subcategory->subcategoryID }}">{{ $subcategory->subcategoryName }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="purchasedValue">Purchased Value</label>
          <input type="text" class="form-control" name="purchasedValue" id="purchasedValue" value="{{ old('purchasedValue') }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="netWorthValue">Net Worth Value</label>
          <input type="text" class="form-control" name="netWorthValue" id="netWorthValue" value="{{ old('netWorthValue') }}">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="roadTaxValue">Road Tax Value</label>
          <input type="text" class="form-control" name="roadTaxValue" id="roadTaxValue" value="{{ old('roadTaxValue') }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="brand">Brand</label>
          <input type="text" class="form-control" name="brand" id="brand" value="{{ old('brand') }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="model">Model</label>
          <input type="text" class="form-control" name="model" id="model" value="{{ old('model') }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="carplate">Vehicle Number Plate</label>
          <input type="text" class="form-control" name="carplate" id="carplate" value="{{ old('carplate') }}">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="colour">Colour</label>
          <input type="text" class="form-control" name="colour" id="colour" value="{{ old('colour') }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="supplier">Supplier</label>
          <input type="text" class="form-control" name="supplier" id="supplier" value="{{ old('supplier') }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="datePurchased">Date Purchased</label>
          <input type="date" class="form-control" name="datePurchased" id="datePurchased" value="{{ old('datePurchased') }}">
        </div>
      </div>
    </div>

    <br>
    <div class="row">
      <div class="col-md-14 text-center">
        <div class="form-group">
          <button class="btn btn-success" type="submit" name="add" value="add">Add Asset</button>
        </div>
      </div>
    </div>
    @include('dashboard.layouts.error')
  </form>

  <div class="box-body">
    <table data-toggle="table"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       id="table">
        <thead>
        <tr>
            <th data-sortable="true">Asset ID</th>
            <th data-sortable="true">Asset Name</th>
            <th data-sortable="true">Subcategory</th>
            <th data-sortable="true">Brand</th>
            <th data-sortable="true">Model</th>
            <th data-sortable="true">Colour</th>
            <th data-sortable="true">Purchased Val</th>
            <th data-sortable="true">Net Worth</th>
            <th data-sortable="true">Road Tax</th>
            <th data-sortable="true">Vehicle No. Plate</th>
            <th data-sortable="true">Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($assets as $asset)
            <tr>
              <td>{{ $asset->assetID }}</td>
              <td>{{ $asset->assetName }}</td>
              <td>{{ $asset->subcategoryName }}</td>
              <td>{{ $asset->brand }}</td>
              <td>{{ $asset->model }}</td>
              <td>{{ $asset->colour }}</td>
              <td>{{ $asset->purchasedValue }}</td>
              <td>{{ $asset->netWorthValue }}</td>
              <td>{{ $asset->roadTaxValue }}</td>
              <td>{{ $asset->carPlate }}</td>
              <td>{{ $asset->currentStatus }}</td>
              <td>
                <div class="form-group" style="margin-top: -2px; margin-bottom: -3px;">
                  <a href="/asset/{{ $asset->assetID }}/edit" class="btn btn-primary"  style="padding-top: 1px; padding-bottom: 0px; padding-left: 9px; padding-right: 9px;">View More</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>

  <script>
    var dateControl = document.querySelector('input[type="datetime-local"]');
    dateControl.value = '2018-11-01T08:30';
  </script>

@endsection
