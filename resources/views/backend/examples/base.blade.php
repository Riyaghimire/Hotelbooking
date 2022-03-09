<!DOCTYPE html>
<html lang="en">
<head>
  <title>Accomodation</title>
  <link href="{{url ('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />



</head>
<body>
  <div class="container">
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('signout') }}">Logout</a>
  </li>


    @yield('main')
  </div>
  <script src="{{url ('frontend/js/bootstrap.min.js') }}" type="text/js"></script>
</body>
</html>