@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Usuarios</div>
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
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"> <!-- old('email') hace que despues de mostrar un error al hacer la validación, el campo de email no quede vacío, sino que le ponga el valor que el usuario ha introducio para que no tenga que volver a difitarlo -->
            </div>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"> <!-- old('name') hace que despues de mostrar un error al hacer la validación, el campo de name no quede vacío, sino que le ponga el valor que el usuario ha introducio para que no tenga que volver a difitarlo -->
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control" value="{{ old('password', str_random(8)) }}"> <!-- old('password') hace que despues de mostrar un error al hacer la validación, el campo de password no quede vacío, sino que le ponga el valor que se ha generado automáticamente de manera aleatoria con 8 caracteres con la funcion str_random o la que el usuario le asigne para que no vuelve a digitarla -->
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Registrar usuario</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>E-mail</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <a href="/usuario/{{ $user->id }}" class="btn btn-sm btn-primary" title="Editar">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="/usuario/{{ $user->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
