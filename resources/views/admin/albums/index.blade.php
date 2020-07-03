@extends('template_backend.home')
@section('content')
<h1>ALBUM</h1>
<a href="{{route('albums.create') }}" class="btn btn-info btn-sm">Add Album</a>


	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Album</th>
				<th>Artist ID</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($albums as $result => $hasil)
			<tr>
				<td>{{ $result + $albums->firstitem() }}</td>
				<td>{{ $hasil->nama_album }}</td>
				<td>{{ $hasil->artis->name }}</td>
				<td>
				<form action="{{ route('albums.destroy', $hasil->id)}}" method="POST">
				@csrf
				@method('delete')
				<a href="{{ route('albums.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
				<button type="submit" class="btn btn-danger btn-sm">Delete</button>
				</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $albums->links()}}
@endsection