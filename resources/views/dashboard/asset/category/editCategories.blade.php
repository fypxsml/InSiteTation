@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Edit Category</h1></center>
  <hr>

  <form autocomplete="off" action="/asset/category/{{ $findC->categoryID }}" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    {{ csrf_field() }}
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="categoryName">Category Name</label>
          <input type="text" class="form-control" name="categoryName" id="categoryName" value="{{ $findC->categoryName }}">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="categoryDescription">Category Description</label>
          <input type="text" class="form-control" name="categoryDescription" id="categoryDescription" value="{{ $findC->categoryDescription }}">
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <button class="btn btn-primary" type="submit" name="save">Save</button>
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <a class="btn btn-primary" href="/asset/category">Cancel</a>
        </div>
      </div>
    </div>
    @include('dashboard.layouts.error')
  </form>


  @endsection
