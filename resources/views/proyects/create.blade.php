@extends('layoutS.app')
@section('title', 'Agregar Nuevo Proyecto')
@section('heading', 'Nuevo Proyecto')
@section('link_text', 'Proyectos')
@section('link', '/proyects')
@section('content')
<div class="row my-3">
<div class="col-lg-8 mx-auto">
<div class="card shadow">
<div class="card-header bg-success">
<h3 class="text-light fw-bold">Nuevo Proyectos</h3>
</div>
<div class="card-body p-4">
<form action="/proyects" method="POST" enctype="multipart/form-data">
@csrf
<div class="my-2">
<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}">

@error('title')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="my-2">
<select name="category" id="category" class="form-control @error('category') is-invalid @enderror" placeholder="Category" value="{{ old('category')}}">

<option value="">Seleccione</option>
@foreach($category as $key => $row)
<option value="{{ $row->id }}">{{ $row->nombre }}</option>
@endforeach
</select>

@error('category')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="my-2">
<input type="file" name="file" id="file" accept="image/*" class="form-control @error('file') is-invalid @enderror">

@error('file')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="my-2">
<textarea name="content" id="content" rows="6" class="form-control @error('content') is-invalid @enderror" placeholder="Proyect Content">{{ old('content')}}</textarea>

@error('content')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="my-2">
<input type="submit" value="Add Post" class="btn btn-primary">
</div>
</form>
</div>
</div>
</div>
</div>
@endsection