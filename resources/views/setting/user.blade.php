@extends('setting.include')

@section('konten')
<div class="col-md-10 ml-auto col-xl-6 mr-auto">
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
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">Umum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">Password</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">Messages</a>
        </li> -->
      </ul>
    </div>

    <div class="card-body">
      <!-- Tab panes -->
      <div class="tab-content text-center">
        <div class="tab-pane active" id="home1" role="tabpanel">
          <form method="POST" action="{{ url('/ubah-data-umum') }}" class="">
                     @csrf
     <h3 class="text-center">Akun Saya</h3>
                     <div class="form-group row">
                         <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                         <div class="col-md-6">
                             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                             @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                         <div class="col-md-6">
                            <input type="hidden" name="emailLawas" value="{{$user->email}}">
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                             @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                     <div class="form-group row mb-0">
                         <div class="col-md-12 float-right">
                             <button type="submit" class="btn btn-primary">
                                 {{ __('Ubah Data') }}
                             </button>
                         </div>
                     </div>
                 </form>

        </div>
        <div class="tab-pane" id="profile1" role="tabpanel">
          <form method="POST" action="{{ url('/ubah-data-password') }}" class="">
                     @csrf
                              
                               <div class="form-group row">
                                   <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                   <div class="col-md-6">
                                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                       @error('password')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                   <div class="col-md-6">
                                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                   </div>
                               </div>

                               <div class="form-group row mb-0">
                                   <div class="col-md-12 float-right">
                                       <button type="submit" class="btn btn-primary">
                                           {{ __('Ubah Data') }}
                                       </button>
                                   </div>
                               </div>
                           </form>
        </div>
        <!-- <div class="tab-pane" id="messages1" role="tabpanel">
          <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
        </div> -->

      </div>
    </div>
  </div>
  <!-- End Tabs on plain Card -->
</div>




              <div class="col-md-8 offset-2">

            </div>

            @stop
