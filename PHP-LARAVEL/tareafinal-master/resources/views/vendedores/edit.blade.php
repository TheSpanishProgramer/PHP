@extends('plantillas.plantilla')
@section('titulo')
    Bazar Shangai
@endsection
@section('cabecera')
    Editar vendedor
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
    <div class="card-header text-center ">Editar Vendedor</div>
    <div class="card-body">
    <form action="{{route('vendedors.update', $vendedor)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="col">
            <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$vendedor->nombre}}"  required>
        </div>
        <div class="col">
                <label for="nom" class="col-form-label">Apellidos</label>
                <input type="text" name="apellido" class="form-control"  value="{{$vendedor->apellido}}"  required>
            </div>
    </div>
   
    <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Direccion</label>
                <input type="text" name="direccion" class="form-control" value="{{$vendedor->direccion}}"  required>
            </div>
            <div class="col">
                    <label for="nom" class="col-form-label">Telefono</label>
                    <input type="text" name="telefono" class="form-control"  value="{{$vendedor->telefono}}"  required>
                </div>
    </div>

        <div class="form-row">
                <div class="col">
                    <label for="nom" class="col-form-label">E-Mail</label>
                    <input type="mail" name="mail" class="form-control"  value="{{$vendedor->mail}}" >
                </div>
                
                <div class="col">
                        <label for="nom" class="col-form-label">Cambiar Imagen</label>
                        <input type="file" class="form-control"  name="imagen"  id="imagen" >
                </div>
                <div class="col">
                        <label for="nom" class="col-form-label">Imagen: </label>
                        <img src="{{asset($vendedor->imagen)}}" width="90px" height="90px" class="rounded-circle">
                </div>
            </div>
            <div class="form-row mt-3">
                <input type="submit" value="Editar" class="btn btn-success mr-3">
                <input type="reset" value="Limpiar" class="btn btn-danger mr-3">
            <a href="{{route('vendedors.index')}}" class="btn btn-info" >Volver</a>
                    
            </div>
    </form>

    </div>

</div>

@endsection