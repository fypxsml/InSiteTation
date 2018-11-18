<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="/img/faces/avatar.jpg" class="user-image" alt="User Image">
          <span class="hidden-xs">{{ Auth::user()->fname }}  {{ Auth::user()->lname }}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="/img/faces/avatar.jpg" class="img-circle" alt="User Image">

            <p>
              {{ Auth::user()->fname}}  {{ Auth::user()->lname }}
              <small>{{ Auth::user()->department }}</small>
            </p>
          </li>
          <!-- Menu Body -->

          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-right">
              <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>

    </ul>
  </div>

</nav>
