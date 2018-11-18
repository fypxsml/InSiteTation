@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Manage Subcategory</h1></center>
  <form autocomplete="off" action="/asset/subcategory" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    {{ csrf_field() }}
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="subcategoryName">Subcategory Name</label>
          <input type="text" class="form-control" name="subcategoryName" id="subcategoryName">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="categoryName">Category Name</label>
          <select class="form-control" id="categoryName" name="categoryName">
            <option disabled selected value="">---Please select---</option>
            @foreach ($categories as $category)
              <option value="{{ $category->categoryID }}">{{ $category->categoryName }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <button class="btn btn-primary" type="submit" name="add" value="add">Add</button>
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
          <th data-sortable="true">Subcategory ID</th>
          <th data-sortable="true">Subcategory Name</th>
          <th data-sortable="true">Category Name</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($subcategories as $subcategory)
        <tr>
          <td>{{ $subcategory-> subcategoryID }}</td>
          <td>{{ $subcategory-> subcategoryName }}</td>
          <td>{{ $subcategory->category->categoryName }}</td>
          <td>
            <div class="form-group" style="margin-top: -2px; margin-bottom: -3px;">
              <a href="/asset/subcategory/{{ $subcategory->subcategoryID }}" class="btn btn-primary"  style="padding-top: 1px; padding-bottom: 0px; padding-left: 9px; padding-right: 9px;">Edit</a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


@endsection
