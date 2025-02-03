@extends('layouts.app')

@section('content')
<div class="row">    
    <h2>Articulos</h2>
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">                      
            @can('product-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('products.create') }}"><i class="fa fa-plus"></i> Articulo Nuevo</a>
            @endcan
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert"> 
        {{ $value }}
    </div>
@endsession

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <form class="grow" autocomplete="off">                                
        <input type="search" name="search" id="search" class="form-control mb-3" placeholder="Buscar..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary mb-3">
        <i class="fa fa-search"></i> Buscar
    </form> 
</div>
</div>

<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th width="280px">Accion</th>
    </tr>
    
    @foreach ($products as $product)
     <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->detail }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}"><i class="fa-solid fa-list"></i> Mostrar</a>
                @can('product-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                @endcan

                @csrf
                @method('DELETE')

                @can('product-delete')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Borrar</button>
                @endcan
            </form>
        </td>
     </tr>
    @endforeach
</table>

{!! $products->links('pagination::bootstrap-5') !!}

<p class="text-center text-primary"><small>InfoSoftWeb - SoftSolutionsArg   </small></p>
@endsection



