@extends('plantillas.plantilla')
@section('titulo')
    Bazar Shangai
@endsection
@section('cabecera')
    Nuevo vendedor
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
    <div class="card-header text-center ">Guardar Vendedor</div>
    <div class="card-body">
    <form action="{{route('vendedors.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="col">
            <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre"  required>
        </div>
        <div class="col">
                <label for="nom" class="col-form-label">Apellidos</label>
                <input type="text" name="apellido" class="form-control"  placeholder="Apellidos"  required>
            </div>
    </div>
   
    <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Direccion"  required>
            </div>
            <div class="col">
                    <label for="nom" class="col-form-label">Telefono</label>
                    <input type="text" name="telefono" class="form-control"  placeholder="Telefono"  required>
                </div>
    </div>

        <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">E-Mail</label>
                    <input type="mail" name="mail" class="form-control"  placeholder="e-mail" >
                </div>
                <div class="col">
                        <label for="nom" class="col-form-label">Imagen</label>
                        <input type="file" class="form-control"  name="imagen"  id="imagen" >
                    </div>
            </div>
            <div class="form-row mt-3">
                <input type="submit" value="Crear" class="btn btn-success mr-3">
                <input type="reset" value="Limpiar" class="btn btn-danger mr-3">
            <a href="{{route('vendedors.index')}}" class="btn btn-info" >Volver</a>
                    
            </div>
    </form>

    </div>

</div>

@endsection