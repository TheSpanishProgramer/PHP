@extends('plantillas.main')
@section('titulo')
    Almezone S.L.
@endsection
@section('cabecera')
    <h1 class="text-center">Añadir nuevo producto</h1>
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
    @if ($text=Session::get('mensaje'))
        <p class="alert alert-success my-1">{{$text}}</p>
    @endif
    <div class="container mt-5">
        <form  name="editar" action="{{route('articulos.store')}}" method="post" enctype="multipart/form-data" class="justify-content-md-center">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <select name="categoria_id">
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="modelo" placeholder="Modelo">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="precio" placeholder="Precio">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="stock" placeholder="Stock">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="detalles" placeholder="Detalles">
                </div>
            </div>
            <div class="row justify-content-center mt-1">
                <div class="col-md-6">
                    <i class="align-middle fas fa-image fa-2x mr-2"></i><input type="file" name="foto" accept="image/*">
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success mr-2">Añadir</i></button>
                    <a href="{{route('articulos.index')}}" class="btn btn-primary"><i class="fas fa-undo"></i></a>
                </div>
            </div>
        </form>
    </div>
@endsection
