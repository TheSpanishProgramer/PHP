@extends('plantillas.main')
@section('titulo')
    Almezone S.L.
@endsection
@section('cabecera')
    <h1 class="text-center">Modificar producto</h1>
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
    <div class="container mt-5">
        <form  name="editar" action="{{route('vendedores.update',$vendedore)}}" method="post" enctype="multipart/form-data" class="justify-content-center">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" value="{{$vendedore->nombre}}" name="nombre">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" value="{{$vendedore->apellidos}}" name="apellidos">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" value="{{$vendedore->telefono}}" name="telefono">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" value="{{$vendedore->email}}" name="email">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" value="{{$vendedore->sueldo}}" name="sueldo">
                </div>
            </div>
            <div class="row justify-content-center mt-1">
                <div class="col-md-6">
                    <label class="mr-2 font-weight-bold">Imágen</label><input type="file" name="foto" accept="image/*">
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <input type="submit" value="Modificar" class="btn btn-success mr-2">
                    <a href="{{route('vendedores.index')}}" class="btn btn-primary"><i class="fas fa-undo"></i></a>
                </div>
            </div>
        </form>
    </div>
@endsection
