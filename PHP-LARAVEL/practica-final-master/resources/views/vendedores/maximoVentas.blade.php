@extends('plantillas.main')
@section('title')
    Almezone S.L.
@endsection
@section('cabecera')
    Empleado con más ventas
@endsection
@section('contenido')
    <div class="card">
        <h5 class="card-header text-primary">Detalles del artículo</h5>
        <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"></p>
        <a href="{{route('vendedores.index')}}" class="btn btn-primary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@endsection
