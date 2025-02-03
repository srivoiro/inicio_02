@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Mostrar Articulo</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Anterior</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
        <div class="form-group">
            <strong>Codigo:</strong>
            {{ $product->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion:</strong>
            {{ $product->detail }}
        </div>
    </div>
</div>

<p class="text-center text-primary"><small>InfoSoftWeb - SoftSolutionsArg</small></p>
@endsection
