<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{ asset('css/material-kit.css?v=2.0.3') }}">

<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top  navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
  <div class="container">
    <div class="navbar-translate">
        <a class="navbar-brand" href="{{ '/' }}">InSiteTation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">
                    <i class="material-icons"></i> Login
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('register') }}" class="btn btn-rose btn-raised btn-round">
                  Register
              </a>
          </li>
        </ul>
    </div>
</div>
</nav>
