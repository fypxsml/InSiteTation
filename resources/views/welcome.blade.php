@extends('layouts.app')
@section('navigation')
@include('layouts.nav')
@endsection
@section('content')

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{ asset('css/material-kit.css?v=2.0.3') }}">
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('../img/bg4.jpg'); ">
        <div class="container">
          @if ($flash = session('message'))
          <div class="row" style="margin-top: -100px;  float: right;">
            <div class="col-md-12">
                <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert" style="margin-left: auto; margin-right: auto; padding: 30px;">
                  {{ $flash }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            </div>
          </div>
          @endif
          <div class="row">
              <div class="col-md-12" style="width: 500px;">
                  <h1 class="title">InSiteTation</h1>
                  <h4>Inventory . Site . Location</h4>
                  <br>
                  <a href="https://www.youtube.com/watch?v=VUe7vcQrbF0" target="_blank" class="btn btn-danger btn-raised btn-lg">
                      <i class="fa fa-play"></i> Watch Video
                  </a>
              </div>
          </div>
        </div>

    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Features</h2>
                        <h5 class="description" style="text-align:center">Here are some InSites to our system</h5>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="material-icons">archive</i>
                                </div>
                                <h4 class="info-title">Inventory</h4>
                                <p style="color: #3D4849;">Asset management, simplified. Minimum fuss, maximum productivity.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">list_alt</i>
                                </div>
                                <h4 class="info-title">Requisition</h4>
                                <p style="color: #3D4849;">Perform asset requisitions at the palm of your hands. No paperwork necessary.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">room</i>
                                </div>
                                <h4 class="info-title">Track</h4>
                                <p style="color: #3D4849;">Update locations using QR code. Assets won't be out of sight anymore.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info">
                                <div class="icon icon-warning">
                                    <i class="material-icons">location_city</i>
                                </div>
                                <h4 class="info-title">Sites</h4>
                                <p style="color: #3D4849;">Straightforward presentation of data. Helps you stay on track as you manage sites.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section text-center">
                <h2 class="title">Here is our team</h2>
                <div class="team">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-profile card-plain">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card-header card-header-image">
                                            <a href="#pablo">
                                                <img class="img" src="../img/faces/camp.jpg">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h4 class="card-title">Loh Sher-Maine</h4>
                                            <h6 class="category text-muted">Project Manager</h6>
                                            <p class="card-description">

                                            </p>
                                        </div>
                                        <div class="card-footer justify-content-center">
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile card-plain">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card-header card-header-image">
                                            <a href="#pablo">
                                                <img class="img" src="../img/faces/kendall.jpg">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h4 class="card-title">Goh Hsin Yen</h4>
                                            <h6 class="category text-muted">Lead Developer</h6>
                                            <p class="card-description">
                                            </p>
                                        </div>
                                        <div class="card-footer justify-content-center">
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile card-plain">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card-header card-header-image">
                                            <a href="#pablo">
                                                <img class="img" src="../img/faces/card-profile6-square.jpg">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h4 class="card-title">Maria Kyla Bravante</h4>
                                            <h6 class="category text-muted">Lead Designer</h6>
                                            <p class="card-description">
                                            </p>
                                        </div>
                                        <div class="card-footer justify-content-center">
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
