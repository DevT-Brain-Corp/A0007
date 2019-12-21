
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title> SOSMEKES </title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{asset('tm/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('tm/assets/css/now-ui-kit.css?v=1.3.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('tm/assets/demo/demo.css')}}" rel="stylesheet" />

  @yield('style')
</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{url('/')}}" style="color: ">
          S O S M E K E S
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          @auth
          @if(Auth::user()->role=="admin")
          <li class="nav-item">
            <a class="nav-link" href="{{url('/user-list')}}" onclick="scrollToDownload()"  style="color: ">
              <i class="now-ui-icons users_single-02"></i>
              <p>User </p>
            </a>
          </li>
          @endif
          @endauth
          <li class="nav-item">
            <a class="nav-link" href="{{url('/artikel')}}" onclick="scrollToDownload()"  style="color: ">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Artikel</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/dokter')}}" onclick="scrollToDownload()"  style="color: ">
              <i class="now-ui-icons business_badge"></i>
              <p>Dokter</p>
            </a>
          </li>
          @auth
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown"  style="color: black" >
              <i class="now-ui-icons ui-1_settings-gear-63"></i>
              <p>Akun</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
              <a class="dropdown-item" href=""  style="color: black" >
                <i class="now-ui-icons users_single-02"></i> {{Auth::user()->name}}
              </a>

              @if(Auth::user()->role=="admin")
              @else
              <a class="dropdown-item" href="{{url('/user')}}/{{Auth::user()->id}}"  style="color: black" >
                <i class="now-ui-icons business_chart-pie-36"></i> Profil Saya
              </a>
              <a class="dropdown-item" href="{{url('/setting-profil')}}"  style="color: black" >
                <i class="now-ui-icons design_bullet-list-67"></i> Setting Profil
              </a>
              @endif
              <hr>
              <a class="dropdown-item"   style="color: black" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="now-ui-icons ui-1_simple-remove"></i>{{ __('Logout') }}
              </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
          </li>
          @endauth

          @guest
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown"  style="color: ">
              <i class="now-ui-icons ui-1_settings-gear-63"></i>
              <p>Autentikasi</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
              <a class="dropdown-item" href="{{url('/register')}}"  style="color: ">
                <i class="now-ui-icons business_chart-pie-36"></i> Registrasi User
              </a>
              <a class="dropdown-item" href="{{url('/register-dokter')}}"  style="color: ">
                <i class="now-ui-icons design_bullet-list-67"></i> Registrasi Dokter
              </a>
              <hr>
              <a class="dropdown-item" href="{{url('/login')}}"  style="color: ">
                <i class="now-ui-icons users_single-02"></i> Masuk
              </a>
            </div>
          </li>
          @endguest

        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header clear-filter" filter-color="" >
      <div class="page-header-image" data-parallax="true" style="background-image:url('{{asset('4.jpg')}}');object-fit: cover;height: 550px;width: 100%;">
      </div>
      <div class="container">
        <div class="content-center brand">
          <img class="n-logo" src="{{asset('tm/assets/img/now-logo.png')}}" alt="">
          <h1 class="h1-seo"  style="color: ">
            @yield('h1')
          </h1>
          <h3  style="color: ">
            @yield('h2')
          </h3>
        </div>
      </div>
    </div>
    <div class="main">
      @yield('content')

    </div>
    <!-- Sart Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="now-ui-icons ui-1_simple-remove"></i>
            </button>
            <h4 class="title title-up">Modal title</h4>
          </div>
          <div class="modal-body">
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default">Nice Button</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--  End Modal -->
    <!-- Mini Modal -->
    <div class="modal fade modal-mini modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <div class="modal-profile">
              <i class="now-ui-icons users_circle-08"></i>
            </div>
          </div>
          <div class="modal-body">
            <p>Always have an access to your profile</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link btn-neutral">Back</button>
            <button type="button" class="btn btn-link btn-neutral" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--  End Modal -->

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
  <script>
    $(document).ready(function() {
      // the body of this function is in assets/js/now-ui-kit.js
      nowuiKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>
