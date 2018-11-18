<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>InSiteTation - Inventory, Site, Location</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-kit.min.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        @yield('navigation')
        @yield('content')
        @yield('footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/material-kit.js') }}"></script>
    <script src="{{ asset('js/bootstrap-material-design.js') }}"></script>
    <script src="{{ asset('js/bootstrap-selectpicker.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('js/jquery.flexisel.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
  </body>

</html>
