@extends('plantillas.plantilla')
@section('titulo')
    Almezone
@endsection
@section('cabecera')
    Bienvenido a Almezone
@endsection
@section('contenido')
    <div class="container text-center mt-5"><img src="{{asset('img/amazon.jpg')}}"></div>
    <div class="container mt-5 text-center">
        <a href="{{route('articulos.index')}}" class="btn btn-success mr-1">Ver productos</a>
    </div>
@endsection
