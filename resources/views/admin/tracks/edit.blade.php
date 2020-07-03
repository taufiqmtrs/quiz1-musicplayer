@extends('template_backend.home')
@section('content')
<h1>Edit Track</h1>

<form action="{{ route('tracks.update', $tracks->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')
<div class="form-group">
	<label> Nama Track</label>
	<input type="text" class="form-control" name="nama_tracks" value="{{ $tracks->nama_tracks}}">
</div>
<div class="form-group">
	<label> Album</label>
	<select class="form-control" name="albums_id">
	<option value="" holder>Pilih Album</option>
	@foreach($albums as $result)
		<option value="{{$result->id}}"

		@if($result->id ==$tracks->albums_id)
		selected
		@endif
		>{{ $result->nama_album }}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<label> Track Time</label>
	<input type="text" class="form-control" name="tracks_time" value="{{ $tracks->tracks_time}}">
</div>
<div class="form-group">
	<label>Track File</label>
	<input type="audio/mpeg" name="tracks_file">
</div>
<div class="form-group">
	<button class="btn btn-primary ">Update</button>
</div>

@endsection