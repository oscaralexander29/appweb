@extends('layout.app')
@section('title', 'Proyect Details')
@section('heading', 'Proyect Details')
@section('link_text', 'Proyectos')
@section('link', '/proyects')
@section('content')
<div class="row my-4">
<div class="col-lg-6 mx-auto">
<div class="card shadow">

<img src="{{ asset('storage/images/'.$proyect->image) }}" class="img-fluid card-img-top">

<div class="card-body p-5">
<div class="d-flex justify-content-between align-items-center">
<p class="btn btn-dark rounded-pill">{{ $proyect->categories->nombre}}</p>
<p class="lead">{{ \Carbon\Carbon::parse($proyect->created_at)->diffForHumans() }}</p>
</div>
<hr>
<h3 class="fw-bold text-primary">{{ $proyect->title }}</h3>
<p>{{ $proyect->content }}</p>
</div>
<div class="card-footer px-5 py-3 d-flex justify-content-end">
<a href="/proyects/{{$proyect->id}}/edit" class="btn btn-success rounded-pillme-2">Edit</a>

<form action="/proyects/{{$proyect->id}}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger rounded-pill">Delete</button>
</form>
</div>
</div>
</div>
</div>
@endsection