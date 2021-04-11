@extends('plantillas.plantilla1')
@section('titulo')
Crear Libro
@endsection
@section('encabezado')
Nuevo Libro
@endsection
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger my-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form name="sd" action="{{route('libros.store')}}" method="POST">
    @csrf
    <div class="row mt-3">
        <div class="col-4">
            <input type="text" placeholder="Titulo" required name="titulo" class="form-control">
        </div>
        <div class="col-3">
            <input type="text" maxlength="13" placeholder="ISBN" name='isbn' required class="form-control">
        </div>
        <div class="col-5">
            <textarea name="descripcion" placeholder="descripcion" class="form-control"></textarea>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <button type="submit" class="btn btn-info mr-2">Crear Libro</button>
            <button type="reset" class="btn btn-warning mr-2">Limpiar</button>
            <a href="{{route('libros.index')}}" class="btn btn-success">Inicio</a>
        </div>
    </div>
</form>
@endsection
