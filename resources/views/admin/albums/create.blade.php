@extends('template_backend.home')
@section('content')
<h1>Tambah Album</h1>

<form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
	<label> Nama Album</label>
	<input type="text" class="form-control" name="nama_album">
</div>
<div class="form-group">
	<label> Artist</label>
	<select class="form-control" name="artis_id">
	<option value="" holder>Pilih Artist</option>
	@foreach($artis as $result)
		<option value="{{$result->id}}">{{ $result->name }}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<button class="btn btn-primary ">Save</button>
</div>

@endsection