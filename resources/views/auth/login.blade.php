
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('tm/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('tm/assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Login
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
        <a class="navbar-brand" href="{{url('/')}}">
          Kembali
        </a>

      </div>

    </div>
  </nav>
  <!-- End Navbar -->
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url({{('tm/assets/img/login.jpg')}})"></div>
    <div class="content">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
             <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="card-header text-center">
                <div class="logo-container">
                  <img src="{{asset('tm/assets/img/now-logo.png')}}" alt="">
                </div>
              </div>
              <div class="card-body">
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" placeholder="E-mail" name="email">
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons text_caps-small"></i>
                    </span>
                  </div>
                  <input type="password" placeholder="Kata sandi" class="form-control" name="password" />
                </div>
              </div>
              <div class="card-footer text-center">
                <!-- <a href="#pablo" class="btn btn-primary btn-round btn-lg btn-block"></a> -->
                <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Masuk</button>
                <div class="Center">
                  <h6>
                    <a href="{{url('/register-dokter')}}" class="link">Buat Akun Baru</a>
                  </h6>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>

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
