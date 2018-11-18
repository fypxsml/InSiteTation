@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Archived Asset - <b>{{ $find->assetID }}</b></h1></center>

  <br>

  <div class="container">
    <div class="col-md-6">
      <table class="table table-borderless">
        <tbody>
          <tr>
            <th scope="row">Asset ID</th>
            <td>{{ $find->assetID }}</td>
          </tr>
          <tr>
            <th scope="row">Asset Name</th>
            <td>{{ $find->assetName }}</td>
          </tr>
          <tr>
            <th scope="row">Subcategory Name</th>
            <td>{{ $find->subcategoryName }}</td>
          </tr>
          <tr>
            <th scope="row">Purchased Value</th>
            <td>{{ $find->purchasedValue }}</td>
          </tr>
          <tr>
            <th scope="row">Net Worth Value</th>
            <td>{{ $find->netWorthValue }}</td>
          </tr>
          <tr>
            <th scope="row">Road Tax Value</th>
            <td>{{ $find->roadTaxValue }}</td>
          </tr>
          <tr>
            <th scope="row">Brand</th>
            <td>{{ $find->brand }}</td>
          </tr>
          <tr>
            <th scope="row">Model</th>
            <td>{{ $find->model }}</td>
          </tr>
          <tr>
            <th scope="row">Colour</th>
            <td>{{ $find->colour }}</td>
          </tr>
          <tr>
            <th scope="row">Car Plate</th>
            <td>{{ $find->carPlate }}</td>
          </tr>
          <tr>
            <th scope="row">Supplier</th>
            <td>{{ $find->supplier }}</td>
          </tr>
          <tr>
            <th scope="row">Date Purchased</th>
            <td>{{ $find->datePurchased }}</td>
          </tr>
          <tr>
            <th scope="row">Current Status</th>
            <td>{{ $find->currentStatus }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <form autocomplete="off" action="/asset/archived/{{ $find->assetID }}" method="post" style="margin-top: 200px">
      @csrf
      <div class="col-md-6">
        <button type="submit" name="button" class="btn btn-primary">Unarchive</button>
      </div>
    </form>

  </div>

@endsection
