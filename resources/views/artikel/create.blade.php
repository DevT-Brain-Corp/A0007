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
<form action="{{url('/buat-artikel')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field()}}   
     <div class="row justify-content-center mt-4">
        <div class="col-md-10">
        	<div class="form-group row">
                <label for="name" class="">Judul Artikel</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="judul" required>
                </div>
            </div>
            @if(Auth::user()->role=="user")    
            <div class="form-group row">
                <label for="name">Kategori Artikel</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="kategori" required>
                </div>
            </div>
            @endif
            @if(Auth::user()->role=="dokter")    
            <input type="hidden" value="{{$userid->dokter->spesialis->bidang}}" name="bidang">    
            @endif            
            <div class="form-group row">
                <label class="">Foto Artikel</label>
                <div class="col-md-6">
                    <input type="file" class="form-control-file" name="foto" required>
                </div>
            </div>
            <div class="form-group row">
	            <label class="col-form-label text-md-right" for="inputDefault">Isi Artikel</label>
				<textarea class="ckeditor" id="ckeditor" cols="30" rows="10" name="deskripsi"></textarea>
			</div>
		</div>
	</div>
		<button type="submit" class="btn btn-info float-right">Buat</button>
	</form>
</div>
</div>

</div>
@stop