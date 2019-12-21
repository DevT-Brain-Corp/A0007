@extends('test')

@section('h1')
Artikel
@stop

@section('h2')
{{$data->judul}}
@stop



@section('content')

<div class="container mt-4">
	<div class="card" style="padding: 20px;">
	<img src="../foto-artikel/{{$data->gambar}}" style="object-fit: cover;height: 250px;width: 100%;">
	<h3 class="mt-4 text-primary">{{$data->judul}}</h3>
	<small>
		<div class="row">
		    @if($data->user->role=="user")
		    <img src="{{asset('foto-user.png')}}" class="rounded-circle ml-3" style="height: 20px;">
		    @endif
		    @if($data->user->role=="dokter")
		    <img src="{{asset('foto-dokter.png')}}" class="rounded-circle ml-3" style="height: 20px;">
		    @endif
		    <p class="ml-2" style="font-size: 12px">Oleh : {{$data->user->name}} ( <strong>{{$data->user->role}}</strong> )</p>
		</div>
	</small>

	<div class="row">
	<div class="col-md-10 text-justify">
		{!! $data->deskripsi !!}
	</div>
	</div>
	</div>
	<h2 class="mt-4">{{$data->komen->count()}} Komentar </h2>

	@foreach($data->komen->sortBy('created_at') as $dk)
	<div class="row">
		<div class="col-md-8 blockquote blockquote-primary">
			<div class="bg-white">
				<b><a href="{{url('user')}}/{{$dk->user->id}}">{{$dk->user->name}}</a> </b>: {{$dk->commenttext}}
				@auth
				@if(Auth::user()->id==$dk->user_id)
				<form action="{{url('/delete-komen')}}" method="POST">
				   {{ csrf_field()}}
				    <input type="hidden" value="{{$dk->id}}" name="thisComment_id">
					<button type="submit" class="btn btn-sm btn-danger float-right" style="margin-top: 25px">Hapus</button>
				</form>
				<button type="button" class="btn btn-sm btn-primary float-right mr-2" data-toggle="modal" data-target="#editCmn{{$dk->id}}"  style="margin-top: 25px">Edit</button>

<div class="modal fade" id="editCmn{{$dk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="{{url('/edit-komen')}}" method="POST">
	   {{ csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Komentar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<input type="hidden" value="{{$dk->id}}" name="thisComment_id">
			<input type="hidden" value="{{$dk->created_at}}" name="time_comment">
			<div class="col-md-12">
				<input type="text" name="edited" value="{{$dk->commenttext}}" class="form-control" placeholder="Tulis komentar disini" required style="height: 50px">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ubah Komentar</button>
      </div>
    </div>
	</form>
  </div>
</div>



				@endif
				@endauth
			<hr>
			</div>
				<p style="font-size:9px;">{{ date('M d, Y h:i A', strtotime($dk->created_at)) }}</p>
		@if($dk->user->role=="dokter")

		<div class="">
			<span class="badge badge-pill badge-primary">Terjawab oleh Dokter</span>
			<h3></h3>
		</div>

		@endif
	
		</div>

	</div>
	@endforeach
	@auth
	<form action="{{url('/buat-komen')}}" method="POST">
    {{ csrf_field()}}
		<div class="row blockquote blockquote-danger col-md-10">
			<input type="hidden" value="{{$data->id}}" name="artikel_id">
			<div class="col-md-10">
				<input type="text" name="commenttext" class="form-control form-control-lg" placeholder="Tulis komentar disini" style="height: 50px;">
			</div>
			<div class="col-md-2" >
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>
	@endauth
</div>
@stop
