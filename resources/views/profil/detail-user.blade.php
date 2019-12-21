
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Kit by Creative Tim
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

<body class="profile-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{url('/')}}" >
          S O S M E K E S
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{asset('/tm/assets/img/blurred-image-1.jpg')}}">
        <ul class="navbar-nav">
          @auth
          @if(Auth::user()->role=="admin")
          <li class="nav-item">
            <a class="nav-link" href="{{url('/user-list')}}" onclick="scrollToDownload()">
              <i class="now-ui-icons users_single-02"></i>
              <p>User </p>
            </a>
          </li>
          @endif
          @endauth
          <li class="nav-item">
            <a class="nav-link" href="{{url('/artikel')}}" onclick="scrollToDownload()">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Artikel</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/dokter')}}" onclick="scrollToDownload()">
              <i class="now-ui-icons business_badge"></i>
              <p>Dokter</p>
            </a>
          </li>
          @auth
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
              <i class="now-ui-icons ui-1_settings-gear-63"></i>
              <p>Akun</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
              <a class="dropdown-item" href="">
                <i class="now-ui-icons users_single-02"></i> {{Auth::user()->name}}
              </a>
              <a class="dropdown-item" href="">
                <i class="now-ui-icons business_chart-pie-36"></i> Profil Saya
              </a>
              <a class="dropdown-item" href="{{url('/setting-profil')}}">
                <i class="now-ui-icons design_bullet-list-67"></i> Setting Profil
              </a>
              <hr>
              <a class="dropdown-item" href="{{ route('logout') }}"
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
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
              <i class="now-ui-icons ui-1_settings-gear-63"></i>
              <p>Autentikasi</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
              <a class="dropdown-item" href="{{url('/register')}}">
                <i class="now-ui-icons business_chart-pie-36"></i> Registrasi User
              </a>
              <a class="dropdown-item" href="{{url('/register-dokter')}}">
                <i class="now-ui-icons design_bullet-list-67"></i> Registrasi Dokter
              </a>
              <hr>
              <a class="dropdown-item" href="{{url('/login')}}">
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
    <div class="page-header clear-filter page-header-small">
      <div class="page-header-image" data-parallax="true" style="background-image:url('{{asset('5.jpg')}}');">
      </div>
      <div class="container">
        <div class="photo-container">
          <img src="{{asset('foto-user.png')}}" alt="">
        </div>
        <h3 class="title">{{$user->name}}</h3>
        <p class="category">{{$user->role}}</p>

      </div>
    </div>
    <div class="section">
      <div class="container">

        <h3 class="title">Artikel Saya</h3>
        <h5 class="description">Ini merupakan artikel yang ditulis oleh <strong>{{$user->name}}</strong></h5>

<div class="row">
@foreach($user->artikel as $d)
<div class="card mt-4 ml-2" style="width: 22rem;">
  <img class="card-img-top" src="{{asset('/foto-artikel/'.$d->gambar)}}" style="object-fit: cover;height: 200px;width: 100%;">
  <div class="card-body">
    <span class="badge badge-pill badge-primary">{{$d->kategori}}</span>
    @auth
            <a href="#" class="nav-link dropdown-toggle float-right" id="navbarDropdownMenuLink1" data-toggle="dropdown" style="display: {{Auth::user()->id == $d->user->id ? "block" : "none"}}">
              <i class="now-ui-icons ui-1_settings-gear-63"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
              <a class="dropdown-item" href="{{url('/edit-artikel')}}/{{$d->id}}">
                <i class="now-ui-icons gestures_tap-01"></i> Edit
              </a>
              <form action="{{url('/delete-artikel-now')}}" method="POST">
                {{ csrf_field()}}
                <input type="hidden" value="{{$d->id}}" name="id_artikel_D">
                <button type="submit" class="dropdown-item btn btn-neutral"><i class="now-ui-icons ui-1_simple-remove"> Hapus</i></button>
              </form>
              <hr><hr>
            </div>

  @endauth
    <h5 class="card-text mt-2"><a href="{{url('/artikel')}}/{{$d->slug}}">{{$d->judul}}</a></h5>

  <div class="row">
    @if($d->user->role=="user")
    <img src="{{asset('foto-user.png')}}" class="rounded-circle ml-3" style="height: 20px;">
    @endif
    @if($d->user->role=="dokter")
    <img src="{{asset('foto-dokter.png')}}" class="rounded-circle ml-3" style="height: 20px;">
    @endif
    <p class="ml-2">Oleh : {{$d->user->name}} ( <strong>{{$d->user->role}}</strong> )</p>
  </div>
  @auth
    @if(Auth::user()->role=="admin" && $d->user->role=="user")
    <form action="{{url('/hapus-artikel')}}" method="POST">
        {{ csrf_field()}}
      <input type="hidden" value="{{$d->id}}" name="id_artikel">
      <button type="submit" class="btn btn-danger btn-sm float-right">Hapus</button>
    </form>
    @endif
  @endauth
  </div>
</div>
@endforeach
</div>
</div>

<!-- End ROW -->
      </div>
    </div>
    <footer class="footer footer-default">
      <div class=" container ">
        <nav>
          <ul>
            <li>
              <a href="https://www.creative-tim.com">
                Creative Tim
              </a>
            </li>
            <li>
              <a href="http://presentation.creative-tim.com">
                About Us
              </a>
            </li>
            <li>
              <a href="http://blog.creative-tim.com">
                Blog
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>, Designed by
          <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
          <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('tm/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('tm/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('tm/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{asset('tm/assets/js/plugins/bootstrap-switch.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="{{asset('tm/assets/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('tm/assets/js/now-ui-kit.js?v=1.3.0')}}" type="text/javascript"></script>
</body>

</html>
