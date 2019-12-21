@extends('test')

@section('h1')
Artikel
@stop

@section('content')


<div class="container mt-4">

@if(session('sukses'))
<div class="alert alert-success" >
{{session('sukses')}}
</div>
@endif
@if(session('gagal'))
<div class="alert alert-danger" >
{{session('gagal')}}
</div>
@endif


@auth
  @if(Auth::user()->role !== "admin")
  <a href="{{url('/tambah-artikel')}}" class="btn btn-primary btn-sm ">Tambah Artikel</a>
  @endif
@endauth

<div class="row">
@foreach($data as $d)
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
    <a href="{{url('user')}}/{{$d->user->id}}"><p class="ml-2">Oleh : {{$d->user->name}} ( <strong>{{$d->user->role}}</strong> )</p></a>
  </div>
  @auth
    @if(Auth::user()->role=="admin" && $d->user->role=="user")
    <form action="{{url('/delete-artikel-now')}}" method="POST">
        {{ csrf_field()}}
      <input type="hidden" value="{{$d->id}}" name="id_artikel_D">
      <button type="submit" class="btn btn-danger btn-sm float-right">Hapus</button>
    </form>
    @endif
  @endauth
  </div>
</div>
@endforeach
</div>
</div>
@stop
