@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">

        @if(session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif
        
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<form action="" method="POST">
        {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" readonly class="form-control" value="{{ old('email', $user->email) }}"> <!-- old('email') hace que despues de mostrar un error al hacer la validación, el campo de email no quede vacío, sino que le ponga el valor que el usuario ha introducio para que no tenga que volver a difitarlo -->
            </div>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"> <!-- old('name') hace que despues de mostrar un error al hacer la validación, el campo de name no quede vacío, sino que le ponga el valor que el usuario ha introducio para que no tenga que volver a difitarlo -->
            </div>

            <div class="form-group">
                <label for="password">Contraseña <em>(Ingresar solo si se desea modificar)</em></label>
                <input type="text" name="password" class="form-control" value="{{ old('password') }}"> <!-- old('password') hace que despues de mostrar un error al hacer la validación, el campo de password no quede vacío, sino que le ponga el valor que el usuario ha introducio para que no tenga que volver a difitarlo -->
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Guardar usuario</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Nivel</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Proyecto A</td>
                    <td>N1</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" title="Editar">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger" title="Eliminar">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
