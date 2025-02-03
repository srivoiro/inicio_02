@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="text-danger">403 - Acceso Denegado</h1>
        <p>No tienes permisos para acceder a esta página.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Volver al inicio</a>
    </div>
@endsection
