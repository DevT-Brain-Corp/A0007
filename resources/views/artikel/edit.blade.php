@extends('test')

@section('style')
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
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


<div class="card">
<form action="{{url('/edit-artikel-sekarang')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field()}}   
     <div class="row justify-content-center mt-4">
     	<input type="hidden" name="artikel_id" value="{{$data->id}}">
        <div class="col-md-10">
            <div class="form-group row">
                <div class="col-md-6">
                    <img src="../foto-artikel/{{$data->gambar}}" style="object-fit: cover;height: 250px;width: 100%;">
                </div>
            </div>

            <div class="form-group row">
                <label class="">Foto Artikel</label>
                <div class="col-md-6">
                    <input type="file" class="form-control-file" name="foto-update">
                </div>
            </div>
        	<div class="form-group row">
                <label for="name" class="">Judul Artikel</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="judul" required value="{{$data->judul}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="">Kategori Artikel</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="kategori" required value="{{$data->kategori}}">
                </div>
            </div>

            <div class="form-group row">
	            <label class="col-form-label text-md-right" for="inputDefault">Isi Artikel</label>
				<textarea class="ckeditor" id="ckeditor" cols="30" rows="10" name="deskripsi">
					{!!$data->deskripsi!!}
				</textarea>
			</div>
		</div>
	</div>
		<button type="submit" class="btn btn-info float-right">Update</button>
	</form>
</div>
</div>

</div>
@stop