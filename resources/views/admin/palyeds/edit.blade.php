@extends('template_backend.home')
@section('content')
<h1>Edit Played</h1>

<form action="{{ route('palyeds.update', $palyeds->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')
<div class="form-group">
	<label> Tracks</label>
	<select class="form-control" name="tracks_id">
	<option value="" holder>Pilih Tracks</option>
	@foreach($tracks as $result)
		<option value="{{$result->id}}"

		@if($result->id ==$palyeds->tracks_id)
		selected
		@endif
		>{{ $result->nama_tracks }}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<button class="btn btn-primary ">Update</button>
</div>

@endsection