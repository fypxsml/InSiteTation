@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Asset Location History</h1></center>
  <hr>

  <div class="box-body">
    <table data-toggle="table"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       id="table">
      <thead>
        <tr>
          <th data-sortable="true">Asset ID</th>
          <th data-sortable="true">AssetName</th>
          <th data-sortable="true">Current Status</th>
          <th data-sortable="true">Subcategory Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach($assets as $asset)
          <tr>
            <td>{{ $asset->assetID }}</td>
            <td>{{ $asset->assetName }}</td>
            <td>{{ $asset->currentStatus }}</td>
            <td>{{ $asset->subcategoryName }}</td>
            <td>
              <a href="/requisition/{{ $asset->assetID }}/history" class="btn btn-primary">View</a>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>

    @include('dashboard.layouts.error')

  </div>
@endsection
