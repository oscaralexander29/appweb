@extends('layouts.app')
@section('title', 'Pagina Principal')
@section('heading', 'Todos los proyectos')
@section('link_text', 'Nuevo Proyecto')
@section('link', '/proyects/create')
@section('content')
@if(session('message'))
<div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
<strong>{{ session('message') }}</strong>

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
@endif
<div class="row g-4 mt-1">
@forelse($proyects as $key => $row)
<div class="col-lg-4">
<div class="card shadow">
<a href="proyects/{{ $row->id }}">
<img src="{{ asset('storage/images/'.$row->image) }}" class="card-img-topimg-fluid">
</a>
<div class="card-body">
<p class="btn btn-success rounded-pill btn-sm">{{ $row->categories->nombre}}</p>

<div class="card-title fw-bold text-primary h4">{{ $row->title }}</div>
<p class="text-secondary">{{ Str::limit($row->content, 100) }}</p>
</div>
</div>
</div>
@empty
<h2 class="text-center text-secondary p-4">No post found in the database!</h2>
@endforelse
<div class="d-flex justify-content-center my-5">
{{ $proyects->onEachSide(1)->links() }}
</div>
</div>
@endsection