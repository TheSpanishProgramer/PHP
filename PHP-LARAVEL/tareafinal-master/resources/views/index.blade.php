@extends('plantillas.plantilla')
@section('titulo')
    Bazar Shangai
@endsection
@section('cabecera')
    Bazar Shangai
@endsection
@section('contenido')
    <div class="txt-center mt-3">
    <a href="{{route('articulos.index')}}" class="btn btn-primary mr-4"> Gestionar Articulos</a>
    <a href="{{route('vendedors.index')}}" class="btn btn-primary mr-4"> Gestionar Vendedores</a>
    <a href="{{route('categorias.index')}}" class="btn btn-primary mr-4"> Gestionar Categorias</a>

    </div>
@endsection