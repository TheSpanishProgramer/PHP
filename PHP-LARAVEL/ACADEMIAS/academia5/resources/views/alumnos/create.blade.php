@extends('plantillas.plantilla')
@section('titulo')
    Academia s.a.
@endsection
@section('cabecera')
    Nuevo alumno
@endsection
@section('contenido')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $miError)
            <li>{{$miError}}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card bg-secondary">
        <div class="card-header">Guardar alumno</div>
        <div class="card-body">
            <form name="a" action="{{route('alumnos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <label for="nom" class="col-form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nom" required>
                    </div>
                    <div class="col">
                        <label for="ape" class="col-form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" id="ape" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="mail" class="col-form-label">E-mail</label>
                        <input type="mail" class="form-control" name="mail" placeholder="E-mail" id="mail" required>
                    </div>
                    <div class="col">
                        <label for="mail" class="col-form-label">Logo</label>
                        <input type="file" name="logo" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="submit" value="Crear" class="btn btn-success">
                        <input type="reset" value="Limpiar" class="btn btn-warning">
                        <a href="{{route('alumnos.index')}}" class="btn btn-info">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
