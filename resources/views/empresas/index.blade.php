@extends('layouts.app')

@section('content')
<div class="row">    
    <h2>Empresas</h2>
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">                      
            @can('empresa-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('empresas.create') }}"><i class="fa fa-plus"></i> Empresa Nueva</a>
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
        <th>Razon Social</th>
        <th>Domicilio</th>
        <th>Provincia</th>
        <th>Telefono</th>
        <th>email</th>
        <th>Condicion IVA</th>
        <th>C.U.I.T.</th>
        <th width="280px">Accion</th>        
    </tr>
    
    @foreach ($empresas as $empresa)
     <tr>
        <td>{{ $empresa->id }}</td>
        <td>{{ $empresa->razon_social }}</td>        
        <td>{{ $empresa->direccion }}</td>
        <td>{{ $empresa->provincia }}</td>
        <td>{{ $empresa->telefono }}</td>        
        <td>{{ $empresa->email }}</td>
        <td>{{ $empresa->Condicion_IVA }}</td>
        <td>{{ $empresa->cuit }}</td>   
        <td>
            <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('$empresas.show',$empresa->id) }}"><i class="fa-solid fa-list"></i> Mostrar</a>
                @can('$empresa-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('$empresas.edit',$empresa->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                @endcan

                @csrf
                @method('DELETE')

                @can('$empresa-delete')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Borrar</button>
                @endcan
            </form>
        </td>
     </tr>
    @endforeach
</table>

{!! $$empresas->links('pagination::bootstrap-5') !!}

<p class="text-center text-primary"><small>InfoSoftWeb - SoftSolutionsArg   </small></p>
@endsection



