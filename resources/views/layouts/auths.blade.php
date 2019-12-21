<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('tm/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('tm/assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Registrasi Dokter
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{asset('tm/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('tm/assets/css/now-ui-kit.css?v=1.3.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('tm/assets/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="dropdown button-dropdown">
        <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
          <span class="button-bar"></span>
          <span class="button-bar"></span>
          <span class="button-bar"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-header">Main menu</a>
          <a class="dropdown-item" href="{{url('/artikel')}}">Artikel</a>
          <a class="dropdown-item" href="#">List Dokter</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{url('/login')}}">Login</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{url('')}}">Registrasi User</a>
          <a class="dropdown-item" href="{{url('/register-dokter')}}">Registrasi Dokter</a>
        </div>
      </div>
      <div class="navbar-translate">
        <a class="navbar-brand" href="" rel="tooltip" title="Kembali ke dashboard" data-placement="bottom" target="_blank">
          Kembali
        </a>
      
      </div>
      
    </div>
  </nav>

  @yield('content')


    </div>
  <!--   Core JS Files   -->
  <script src="{{asset('tm/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('tm/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('tm/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{asset('tm/assets/js/plugins/bootstrap-switch.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{asset('tm/assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="{{asset('tm/assets/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('tm/assets/js/now-ui-kit.js?v=1.3.0')}}" type="text/javascript"></script>
</body>

</html>