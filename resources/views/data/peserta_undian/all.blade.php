@extends('layouts.app')

@section('content')
	<div class="container">
		<hr>
		<a class="btn" href="{{route('home')}}">Home</a>
		<a class="btn" href="{{route('data_undian')}}">Data Undian</a>
		<a class="btn" href="{{route('data_peserta_undian')}}">Data Peserta Undian</a>
		<hr>
		<h2>Data Peserta Undian</h2>
		<div class="right">
		<a class="btn" href="{{route('data_peserta_undian_add')}}">Tambah Data Peserta Undian</a>
		<a class="btn" href="{{route('data_peserta_undian_import')}}">Import Data Peserta Undian</a>
		</div>
		<table class="highlight">
			<thead>
				<th>Code</th>
				<th>Name</th>
				<th>Position</th>
				<th>Department</th>
				<th>Seat Number</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@foreach($data as $key)
				<tr>
					<td>{{$key->code}}</td>
					<td>{{$key->name}}</td>
					<td>{{$key->position}}</td>
					<td>{{$key->department}}</td>
					<td>{{$key->seat_number}}</td>
					<td><a href="{{route('data_peserta_undian_edit',$key->id)}}">Edit</a></td>
					<td><a onclick="return confirm('Hapus data undian {{$key->name}}?');" href="{{route('data_peserta_undian_delete',$key->id)}}">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection