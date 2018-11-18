<!DOCTYPE html>
<html lang="en" dir="ltr">
  @include('layouts.header')
  <body>
    @include('layouts.navbar')

    <div class="jumbotron jumbotron-fluid" style="background-color: #ff9999;">
      <div class="container">
        <h1 class="display-4">Error 401: Unauthorized</h1>
        <p class="lead">You need to login to proceed to this page.</p>
        <a href="/login" style="color: black; font-size: 15px;">Click to login</a>
      </div>
    </div>

    @include('layouts.footer')
  </body>
</html>
