@extends('template_backend.home')
@section('content')

<h1>Tambah Artist</h1>

<form action="{{ route('artis.store') }}" method="POST">
@csrf
<div class="form-group">
	<label> Artist</label>
	<input type="text" class="form-control" name="name">
</div>
<div class="form-group">
	<button class="btn btn-primary ">Save</button>
</div>

@endsection