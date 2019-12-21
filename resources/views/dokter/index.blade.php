@extends('test')


@section('content')
<div class="container">
<table class="table table-bordered table-hover text-center">
	<thead>
		<th>No</th>
		<th>Nama</th>
		<th>Spesialis</th>
		<th>KTP</th>
		<th>NoHP</th>
		<th>#</th>
	</thead>
	<tbody>
		@foreach($dokter as $d => $i)
		<tr>
			<td>{{$d+1}}</td>
			<td>{{$i->nama}}</td>
			<td>{{$i->spesialis->nama_spesialis}}</td>
			<td>{{$i->noktp}}</td>
			<td>{{$i->nohp}}</td>
			<td><a href="{{url('/user/')}}/{{$i->user->id}}" class="btn btn-primary btn-sm">Detail</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection
