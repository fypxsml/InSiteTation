@extends('layouts.app')
@section('content')

<body class="reset-page ">
   <div class="page-header header-filter" filter-color="purple" style="background-image: url(&apos;../assets/img/bg7.jpg&apos;); background-size: cover; background-position: top center;">
      <div class="container">
         <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
               <div class="card card-signup">
                  <h2 class="card-title text-center">Reset Password</h2>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-17 ml-auto">
                           <!-- Centering for login -->
                        </div>

                        <!-- Social media login -->
                        <div class="col-md-9 mr-auto">
                           <div class="social text-center">
                              @if (session('status')) <!-- Success alert -->
                              <div class="alert-box success">
                                 {{ session('status') }}
                              </div>
                              @endif
                           </div>

                           <!-- Login -->
                           <form autocomplete="off" class="form" method="POST" action="{{ route('password.request') }}">
                              @csrf
                               <input type="hidden" name="token" value="{{ $token }}">

                              <div class="form-group">
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text">
                                       <i class="material-icons">E-Mail Address</i>
                                       </span>
                                    </div>
                                    <!-- <input type="text" class="form-control" placeholder="Email..."> -->
                                    <input placeholder="Email..." id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif



                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                             <i class="material-icons">Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                                             </span>
                                          </div>
                                          <!-- <input type="password"  class="form-control" /> -->

                                          <input placeholder="Password..." id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                          @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                              <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                          @endif

                                       </div>


                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                             <i class="material-icons">Confirm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                                             </span>
                                          </div>

                                          <input placeholder="Confirm Password..." id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                          @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                              <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                          @endif
                                       </div>

                                 </div>
                              </div>
                              <div class="text-center" class="form-group row mb-0">
                                 <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary btn-round">
                                    {{ __('Reset Password') }}
                                    </button>
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
@endsection
