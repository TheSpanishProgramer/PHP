@extends('plantillas.plantilla')
@section('titulo')
    Bazar Shangai
@endsection
@section('cabecera')
    Editar categoria
@endsection
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $miError)
        <li>{{$miError}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card bg-secondary">
    <div class="card-header text-center ">Editar Categoria</div>
    <div class="card-body">
    <form action="{{route('categorias.update', $categoria)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="col">
            <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}"  required>
        </div>
    </div>
            <div class="form-row mt-3">
                <input type="submit" value="Modificar" class="btn btn-success mr-3">
                <input type="reset" value="Limpiar" class="btn btn-danger mr-3">
            <a href="{{route('categorias.index')}}" class="btn btn-info" >Volver</a>
                    
            </div>
    </form>
    </div>
</div>
@endsection