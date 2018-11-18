@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Archived Assets</h1></center>

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
            <th data-sortable="true">Subcategory Name</th>
            <th data-sortable="true">Brand</th>
            <th data-sortable="true">Model</th>
            <th data-sortable="true">Colour</th>
            <th data-sortable="true">Car Plate</th>
            <th data-sortable="true">Date Purchased</th>
            <th data-sortable="true">Current Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($archives as $asset)
            <tr>
              <td>{{ $asset->assetID }}</td>
              <td>{{ $asset->assetName }}</td>
              <td>{{ $asset->subcategoryName }}</td>
              <td>{{ $asset->brand }}</td>
              <td>{{ $asset->model }}</td>
              <td>{{ $asset->colour }}</td>
              <td>{{ $asset->carPlate }}</td>
              <td>{{ $asset->datePurchased }}</td>
              <td>{{ $asset->currentStatus }}</td>
              <td>
                <div class="form-group" style="margin-top: -2px; margin-bottom: -3px;">
                  <a href="/asset/archived/{{ $asset->assetID }}" class="btn btn-primary" style="padding-top: 1px; padding-bottom: 0px; padding-left: 9px; padding-right: 9px;">View More</a>
                </div>
              </td>
            <tr>
          @endforeach
        </tbody>
    </table>
  </div>


@endsection
