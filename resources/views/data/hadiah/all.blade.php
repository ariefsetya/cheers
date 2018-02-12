@extends('layouts.app')

@section('content')

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="{{route('home')}}">
            <i class="large material-icons">home</i>
        </a>
    </div>
	<div class="container">
		<hr>
		<a class="btn" href="{{route('home')}}">Home</a>
		<a class="btn" href="{{route('data_undian')}}">Data Undian</a>
		<a class="btn" href="{{route('data_hadiah')}}">Data Hadiah</a>
		<a class="btn" href="{{route('data_peserta_undian')}}">Data Peserta Undian</a>
		<hr>
		<h2>Data Hadiah</h2>
		<a class="btn right" href="{{route('data_hadiah_add')}}">Tambah Data Hadiah</a>

		<table class="highlight">
			<thead>
				<th>Hadiah</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@foreach($data as $key)
				<tr>
					<td>{{$key->hadiah}}</td>
					<td><a href="{{route('data_hadiah_edit',$key->id)}}">Edit</a></td>
					<td><a onclick="return confirm('Hapus data hadiah {{$key->name}}?');" href="{{route('data_hadiah_delete',$key->id)}}">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection