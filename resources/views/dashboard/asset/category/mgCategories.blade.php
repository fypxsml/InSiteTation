@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Manage Category</h1></center>
  <form autocomplete="off" action="/asset/category" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    {{ csrf_field() }}
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="categoryName">Category Name</label>
          <input type="text" class="form-control" name="categoryName" id="categoryName">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="categoryDescription">Category Description</label>
          <input type="text" class="form-control" name="categoryDescription" id="categoryDescription">
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
            <th data-sortable="true">Category ID</th>
            <th data-sortable="true">Category Name</th>
            <th data-sortable="true">Category Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <td>{{ $category-> categoryID }}</td>
              <td>{{ $category-> categoryName }}</td>
              <td>{{ $category-> categoryDescription }}</td>
              <td>
                <div class="form-group" style="margin-top: -2px; margin-bottom: -3px;">
                  <a href="/asset/category/{{ $category->categoryID }}" class="btn btn-primary" style="padding-top: 1px; padding-bottom: 0px; padding-left: 9px; padding-right: 9px;">Edit</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>

@endsection
