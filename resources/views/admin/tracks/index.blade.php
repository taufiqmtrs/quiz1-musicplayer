@extends('template_backend.home')
@section('content')
<h1>TRACK</h1>
<a href="{{route('tracks.create') }}" class="btn btn-info btn-sm">Add Track</a>


	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama_Tracks</th>
				<th>Album_ID</th>
				<th>Track_Time</th>
				<th>Track_File</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tracks as $result => $hasil)
			<tr>
				<td>{{ $result + $tracks->firstitem() }}</td>
				<td>{{ $hasil->nama_tracks }}</td>
				<td>{{ $hasil->nama_album }}</td>
				<td>{{ $hasil->tracks_time }}</td>
				<td>{{ $hasil->tracks_file }}</td>

				<td>
				<form action="{{ route('tracks.destroy', $hasil->id)}}" method="POST">
				@csrf
				@method('delete')
				<a href="{{ route('tracks.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
				<button type="submit" class="btn btn-danger btn-sm">Delete</button>
				</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $tracks->links()}}
@endsection