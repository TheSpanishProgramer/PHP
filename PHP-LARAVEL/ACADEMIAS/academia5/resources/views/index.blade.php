@extends('plantillas.plantilla')
@section('titulo')
    Academia s.a.
@endsection
@section('cabecera')
    Academia S.A.
@endsection
@section('contenido')
    <div class="mt-4">
        <div class="text-center">
            <a href="{{route('alumnos.index')}}" class="btn btn-primary mr-4">Gestionar alumnos</a>
            <a href="{{route('modulos.index')}}" class="btn btn-primary mr-4">Gestionar modulos</a>
        </div>        
    </div>
@endsection