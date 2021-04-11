@extends('plantillas.main')
@section('titulo')
    Almezone S.L.
@endsection
@section('cabecera')
    Características
@endsection
@section('contenido')
    <div class="card">
        <h5 class="card-header text-primary">Detalles del artículo</h5>
        <div class="card-body">
        <h5 class="card-title">{{$articulo->nombre.' '.$articulo->modelo}}</h5>
        <p class="card-text">{{$articulo->detalles}}</p>
        <a href="{{route('articulos.index')}}" class="btn btn-primary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@endsection
