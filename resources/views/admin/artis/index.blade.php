@extends('template_backend.home')
@section('content')
<h1>ARTIST</h1>
<a href="{{route('artis.create') }}" class="btn btn-info btn-sm">Add Artist</a>


	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Artist</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($artis as $result => $hasil)
			<tr>
				<td>{{ $result + $artis->firstitem() }}</td>
				<td>{{ $hasil->name }}</td>
				<td>
				<form action="{{ route('artis.destroy', $hasil->id)}}" method="POST">
				@csrf
				@method('delete')
				<a href="{{ route('artis.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
				<button type="submit" class="btn btn-danger btn-sm">Delete</button>
				</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $artis->links()}}
@endsection