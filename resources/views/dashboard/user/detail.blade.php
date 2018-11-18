@extends ('dashboard.layouts.master')

@section ('content')

  <center><h1 class="display-1">User - {{ $user->staffID }}</h1></center>
  <br>
  <div class="content" style="width: 95%; margin-left: auto; margin-right: auto">
    <div class="row">
      <div class="col-md-3">
        <h4><b>Staff ID: </b>{{ $user->staffID }}</h4>
      </div>
      <div class="col-md-3">
        <h4><b>User ID: </b>{{ $user->userID }}</h4>
      </div>
      <div class="col-md-3">
        <h4><b>First Name: </b>{{ $user->fname }}</h4>
      </div>
      <div class="col-md-3">
        <h4><b>Last Name: </b>{{ $user->lname }}</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <h4><b>Contact: </b>{{ $user->contact }}</h4>
      </div>
      <div class="col-md-3">
        <h4><b>Email: </b>{{ $user->email }}</h4>
      </div>
      <div class="col-md-3">
        <h4><b>Gender: </b>{{ $user->gender }}</h4>
      </div>
      <div class="col-md-3">
        <h4><b>Department: </b>{{ $user->department }}</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-md-5">
        <h4><b>Address: </b>{{ $user->address }}</h4>
      </div>
      <div class="col-md-3">
        <h4><b>Emergency Contact: </b>{{ $user->emergencyContact }}</h4>
      </div>
      <div class="col-md-3">
        <h4><b>Status: </b>{{ $user->status }}</h4>
      </div>
    </div>

  </div>

  <div class="row" style=" width: 90%; margin-left: auto; margin-right: auto">
    <a href="/user/search" class="btn btn-primary">Back</a>
  </div>

@endsection
