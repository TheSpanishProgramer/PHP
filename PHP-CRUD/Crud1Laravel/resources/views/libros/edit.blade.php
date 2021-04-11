@extends('plantillas.plantilla1')
@section('titulo')
Editar Libro
@endsection
@section('encabezado')
Modificar Libro
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
<form name="sd" action="{{route('libros.update', $libro)}}" method="POST">
    @csrf
    @method("PUT")
    <div class="row mt-3">
        <div class="col-4">
            <input type="text" required name="titulo" value="{{$libro->titulo}}" class="form-control">
        </div>
        <div class="col-3">
            <input type="text" maxlength="13" name='isbn' value="{{$libro->isbn}}" required class="form-control">
        </div>
        <div class="col-5">
            <textarea name="descripcion" placeholder="descripcion" class="form-control">{{$libro->descripcion}}</textarea>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <button type="submit" class="btn btn-info mr-2">Actualizar Libro</button>

            <a href="{{route('libros.index')}}" class="btn btn-success">Inicio</a>
        </div>
    </div>
</form>
@endsection
