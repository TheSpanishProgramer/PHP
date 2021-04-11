@extends('admin.layouts.layout')

@section('meta-title')
    Crear un usuario
@endsection

@section('meta-title-header')
    Crear usuario
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Formulario de creación de usuarios
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.user.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="control-label" for="name">Nombre</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="introduce el nombre" value="{{ old('name') }}">
                                    {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="control-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="introduce el email" value="{{ old('email') }}">
                                    {!! $errors->first('email', '<span class="help-block text-danger">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="control-label" for="password">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="introduce contraseña">
                                    {!! $errors->first('password', '<span class="help-block text-danger">:message</span>') !!}
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="control-label" for="password-confirmation">Confirmar contraseña</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="introduce la contraseña de nuevo">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                                    <label class="control-label">Rol: </label>
                                    <select class="form-control" name="role">

                                        @foreach($roles as $role)

                                            <option {{ old('role') == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>

                                        @endforeach

                                    </select>
                                    {!! $errors->first('role', '<span class="help-block text-danger">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary">Crear usuario</button>
                                <a href="{{ route('admin.user') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection