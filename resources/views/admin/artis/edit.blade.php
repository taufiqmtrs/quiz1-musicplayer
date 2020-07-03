@extends('template_backend.home')

@section('content')
<h1>Edit Artist</h1>

<form action="{{ route('artis.update', $artis->id)}}" method="POST">
@csrf
@method('patch')
<div class="form-group">
	<label> Artist</label>
	<input type="text" class="form-control" name="name" value="{{ $artis->name}}">
</div>
<div class="form-group">
	<button class="btn btn-primary ">Update</button>
</div>

@endsection