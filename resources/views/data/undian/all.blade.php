@extends('layouts.app')

@section('content')
	<div class="container">
		<hr>
		<a class="btn" href="{{route('home')}}">Home</a>
		<a class="btn" href="{{route('data_undian')}}">Data Undian</a>
		<a class="btn" href="{{route('data_peserta_undian')}}">Data Peserta Undian</a>
		<hr>
		<h2>Data Undian</h2>
		<a class="btn right" href="{{route('data_undian_add')}}">Tambah Data Undian</a>

		<table class="highlight">
			<thead>
				<th>Title</th>
				<th>Stops</th>
				<th>Max Running</th>
				<th>Duration</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@foreach($data as $key)
				<tr>
					<td>{{$key->name}}</td>
					<td>{{$key->stops}}</td>
					<td>{{$key->max_running}}</td>
					<td>{{$key->duration}}s</td>
					<td><a href="{{route('data_undian_edit',$key->id)}}">Edit</a></td>
					<td><a onclick="return confirm('Hapus data undian {{$key->name}}?');" href="{{route('data_undian_delete',$key->id)}}">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection