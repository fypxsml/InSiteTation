<!doctype html>
<html lang="{{ app()->getLocale() }}">
  @include('dashboard.layouts.header')

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <header class="main-header">

    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I.S.T</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>InSiteTation</b></span>
    </a>

    @include('dashboard.layouts.nav')
    </header>

    @include('dashboard.layouts.sidenav')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>


  @include('dashboard.layouts.footer')
</body>
</html>
