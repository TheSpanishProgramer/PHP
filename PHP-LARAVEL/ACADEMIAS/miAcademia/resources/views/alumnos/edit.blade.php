@extends('plantillas.plantilla1')
@section('titulo')
    Editar Alumno
@endsection
@section('cabecera')
    Actualizar los datos del Alumno
@endsection
@section('contenido')
    {{-- Esto esta en la pagina de laravel y validacion, lo hemos sacado de ahi --}}
    @if ($errors->any())
        <div class="alert alert-danger my-3 p-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('alumnos.update', $alumno) }}" name="formulario" method="post" enctype="multipart/form-data"
        class="mt-3">
        @csrf
        {{-- Nos pide ese metodo el route:list para el update --}}
        @method('PUT')
        <div class="row m-3">
            <div class="col-2">
                <input type="text" name="nombre" required value="{{ $alumno->nombre }}" class="form-control">
            </div>
            <div class="col-5">
                <input type="text" name="apellidos" value="{{ $alumno->apellidos }}" class="form-control">
            </div>
            <div class="col-5">
                <b>Foto: </b><input type="file" name="imagen" class="form-control-file" />
            </div>
        </div>
        <div class="row m-3">
            <div class="col-5">
                <input type="text" name="email" required value="{{ $alumno->email }}" class="form-control">
            </div>
            <div class="col-2">
                <input type="text" name="telefono" value="{{ $alumno->telefono }}" class="form-control">
            </div>
            <div class="col-5">
                <img src="{{ asset($alumno->imagen) }}" class="img-thumbnail" width="80px" height="80px" />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-success mb-3">
                    <i class="fa fa-edit"></i>Modificar Alumno
                </button>
                <a href="{{ route('alumnos.index') }}" class="btn btn-primary mb-3">
                    <i class="fa fa-house-user"></i>Volver
                </a>
            </div>
        </div>
    </form>
@endsection
