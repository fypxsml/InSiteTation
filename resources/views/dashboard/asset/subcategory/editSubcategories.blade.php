@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">Edit Subcategory</h1></center>
  <hr>

  <form autocomplete="off" action="/asset/subcategory/{{ $findS->subcategoryID }}" method="POST" style="width: 90%; margin-left:auto; margin-right: auto;">
    {{ csrf_field() }}
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="categoryName">Category Name</label>
          <input type="text" class="form-control" name="subcategoryName" id="subcategoryName" value="{{ $findS->subcategoryName }}">
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
          <button class="btn btn-primary" type="submit" name="save">Save</button>
        </div>
      </div>
      <div class="col-md-1" style="margin-top: 25px;">
        <div class="form-group">
          <a class="btn btn-primary" href="/asset/subcategory">Cancel</a>
        </div>
      </div>
    </div>
    @include('dashboard.layouts.error')
  </form>


@endsection
