@extends('template_backend.home')
@section('content')
<h1>Tambah Track</h1>

<form action="{{ route('tracks.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
	<label> nama Track</label>
	<input type="text" class="form-control" name="nama_tracks">
</div>
<div class="form-group">
	<label> Album </label>
	<select class="form-control" name="albums_id">
	<option value="" holder>Pilih Album</option>
	@foreach($albums as $result)
		<option value="{{$result->id}}">{{ $result->nama_album }}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<label>Track Time</label>
	<input type="text" class="form-control" name="tracks_time">
</div>
<div class="form-group">
	<label>Track File</label>
	<input type="audio/mpeg" name="tracks_file">
</div>
<div class="form-group">
	<button class="btn btn-primary ">Save</button>
</div>

@endsection