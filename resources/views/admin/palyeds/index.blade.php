@extends('template_backend.home')
@section('content')
<h1>PLAYED</h1>
<a href="{{route('palyeds.create') }}" class="btn btn-info btn-sm">Add Played</a>


	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama_Tracks</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($palyeds as $result => $hasil)
			<tr>
				<td>{{ $result + $palyeds->firstitem() }}</td>
				<td>{{ $hasil->tracks->nama_tracks }}</td>
				<td>
				<form action="{{ route('palyeds.destroy', $hasil->id)}}" method="POST">
				@csrf
				@method('delete')
				<a href="{{ route('palyeds.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
				<button type="submit" class="btn btn-danger btn-sm">Delete</button>
				</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $palyeds->links()}}
@endsection