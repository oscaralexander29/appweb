@extends('layout.app')
@section('title', 'Edit Proyect')
@section('heading', 'Edit This Proyect')
@section('link_text', 'Proyectos')
@section('link', '/proyects')
@section('content')
<div class="row my-3">
<div class="col-lg-8 mx-auto">
<div class="card shadow">
<div class="card-header bg-primary">
<h3 class="text-light fw-bold">Edit Proyect</h3>
</div>
<div class="card-body p-4">
<form action="/proyects/{{ $proyect->id }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="my-2">
<input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $proyect->title }}" required>

</div>
<div class="my-2">
<select name="category" id="category" class="form-control" placeholder="Category" value="{{ old('category') }}">

<option value="">Seleccione</option>
@foreach($category as $key => $row)
@if ($row->id==$proyect->category_id)
<option selected value="{{ $row->id }}">{{ $row->nombre }}</option>

@else
<option value="{{ $row->id }}">{{ $row->nombre }}</option>
@endif
@endforeach
</select>
</div>
<div class="my-2">
<input type="file" name="file" id="file" accept="image/*" class="form-control">
</div>

<img src="{{ asset('storage/images/'.$proyect->image) }}" class="img-fluid img-thumbnail" width="150">

<div class="my-2">
<textarea name="content" id="content" rows="6" class="form-control" placeholder="Post Content" required>{{ $proyect->content }}</textarea>

</div>
<div class="my-2">
<input type="submit" value="Update Proyect" class="btn btn-primary">
</div>
</form>
</div>
</div>
</div>
</div>
@endsection