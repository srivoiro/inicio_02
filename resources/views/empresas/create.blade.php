@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar Empresa</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('$empresas.index') }}"><i class="fa fa-arrow-left"></i> Anterior</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> No se pudo guardar. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('$empresas.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Razon Social:</strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nombre de la Empresa">

                <strong>Domicilio:</strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Domicilio de la Empresa">

                <strong>Provincia:</strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Provincia">

                <strong>Telefono:</strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Telefono">

                <strong>Email:</strong>                
                <input type="email" name="name" value="{{ old('name') }}" class="form-control" placeholder="Email">

                
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>               
        </div>
    </div>
</form>

<p class="text-center text-primary"><small>InfosfotWeb - SoftSolutionsArg/small></p>
@endsection
