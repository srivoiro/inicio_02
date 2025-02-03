@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Usuario</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> Anterior</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Error!</strong> No se pudo guardar el Usuario.<br><br>
      <ul>
         @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
         @endforeach
      </ul>
    </div>
@endif

<form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="name" placeholder="Nombre" class="form-control" value="{{ $user->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" placeholder="Email" class="form-control" value="{{ $user->email }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                    <div class="input-group-append">
                         <button type="button" id="toggle-password-1" class="btn btn-secondary">👁️</button>
                    </div>
                </div>    
            </div>

            <script>
                document.getElementById('toggle-password-1').addEventListener('click', function() {
                    let passwordField = document.getElementById('password');
                    passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
                });
            </script>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirmar Password:</strong>
                <div class="input-group">
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmar Password" class="form-control">
                    <div class="input-group-append">
                         <button type="button" id="toggle-password-2" class="btn btn-secondary">👁️</button>
                    </div>     
                </div>
            </div>        
        
            <script>
                document.getElementById('toggle-password-2').addEventListener('click', function() {
                let passwordField = document.getElementById('confirm-password');
                passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
                });
            </script>
        </div>

        <div class="col-xs-24 col-sm-24 col-md-12">
            <div class="form-group">
                <strong>Rol:</strong>
                <select name="roles[]" class="form-control" multiple="multiple">
                    @foreach ($roles as $value => $label)
                        <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : ''}}>
                            {{ $label }}
                        </option>
                     @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        </div>
    </div>
</form>

<p class="text-center text-primary"><small>Infosoft - SoftSolutionsArg</small></p>
@endsection
