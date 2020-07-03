@extends('template_backend.home')
@section('content')
<h1>Edit Album</h1>

<form action="{{ route('albums.update', $albums->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')
<div class="form-group">
	<label> Nama Album</label>
	<input type="text" class="form-control" name="nama_album" value="{{ $albums->nama_album}}">
</div>
<div class="form-group">
	<label> Artist</label>
	<select class="form-control" name="tracks_id">
	<option value="" holder>Pilih Artist</option>
	@foreach($artis as $result)
		<option value="{{$result->id}}"

		@if($result->id ==$albums->artis_id)
		selected
		@endif
		>{{ $result->name }}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<button class="btn btn-primary ">Update</button>
</div>

@endsection