@extends('test')


@section('content')
<div class="container">
<table class="table table-bordered table-hover text-center">
	<thead>
		<th>No</th>
		<th>Nama</th>
		<th>Email</th>
		<th>ID</th>
		<th>#</th>
	</thead>
	<tbody>
		@foreach($user as $d => $i)
		<tr>
			<td>{{$d+1}}</td>
			<td>{{$i->name}}</td>
			<td>{{$i->email}}</td>
			<td>{{$i->id}}</td>
			<td><a href="{{url('/user/')}}/{{$i->id}}" class="btn btn-primary btn-sm">Detail</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection
