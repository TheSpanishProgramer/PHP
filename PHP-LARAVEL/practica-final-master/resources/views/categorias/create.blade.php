@extends('plantillas.main')
@section('titulo')
    Almezone S.L.
@endsection
@section('cabecera')
    <h1 class="text-center">Añadir nueva categoria</h1>
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
        <form  name="editar" action="{{route('categorias.store')}}" method="post" enctype="multipart/form-data" class="justify-content-md-center">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nombre" placeholder="Categoria">
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success mr-2">Añadir</i></button>
                    <a href="{{route('categorias.index')}}" class="btn btn-primary"><i class="fas fa-undo"></i></a>
                </div>
            </div>
        </form>
    </div>
@endsection
