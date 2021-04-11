@extends('plantillas.plantilla')
@section('titulo')
    Academia s.a.
@endsection
@section('cabecera')
    Nuevo modulo
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
        <div class="card-header">Guardar modulo</div>
        <div class="card-body">
            <form name="a" action="{{route('modulos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <label for="nom" class="col-form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="col">
                        <label for="ape" class="col-form-label">Horas</label>
                        <input type="text" class="form-control" name="horas" placeholder="Horas" required>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="submit" value="Crear" class="btn btn-success">
                        <input type="reset" value="Limpiar" class="btn btn-warning">
                        <a href="{{route('modulos.index')}}" class="btn btn-info">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection