@extends('template_backend.home')
@section('content')
<h1>TAMBAH PLAYED</h1>

<form action="{{ route('palyeds.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
	<label> Tracks</label>
	<select class="form-control" name="tracks_id">
	<option value="" holder>Pilih Tracks</option>
	@foreach($tracks as $result)
		<option value="{{$result->id}}">{{ $result->nama_tracks }}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<button class="btn btn-primary ">Save</button>
</div>

@endsection