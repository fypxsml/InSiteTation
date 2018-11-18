@extends('layouts.app')
@section('navigation')
@include('layouts.nav')
@endsection
@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
        <link rel="icon" href="../assets/img/favicon.png">
        <title>

        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../assets/css/material-kit.css?v=2.0.3">
        <!-- Documentation extras -->
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/assets-for-demo/demo.css" rel="stylesheet" />
        <link href="../assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
    </head>
    <body class="signup-page ">
      <div class="page-header header-filter" filter-color="white" data-parallax="true" background-size: cover; background-position: top center; style=" background-image: url('../img/bg9.jpg'); ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Login</h2>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-17 ml-auto">
                                        <!-- Centering for login -->
                                    </div>

                                    <!-- Social media login -->
                                    <div class="col-md-5 mr-auto">

                                        <!-- Login -->
                                        <form  autocomplete="off" class="form" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                        </span>
                                                    </div>
                                                    <input placeholder="User ID" id="userID" type="userID" class="form-control{{ $errors->has('userID') ? ' is-invalid' : '' }}" name="userID" value="{{ old('userID') }}" required autofocus>
                                                    @if ($errors->has('userID'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('userID') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                        </span>
                                                    </div>
                                                    <input placeholder="Password..." class="form-control" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                    @if ($errors->has('password'))
                                                      <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                      </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input class="form-check-input" value="" checked type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                                </label>
                                            </div>
                                            <div class="text-center" class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-3">
                                                    <button type="submit" class="btn btn-rose btn-round">
                                                    {{ __('Login') }}
                                                    </button>
                                                </div>
                                                <div class="col-md-8 offset-md-0">
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
