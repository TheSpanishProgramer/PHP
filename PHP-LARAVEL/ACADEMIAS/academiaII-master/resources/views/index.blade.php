@extends('plantillas.plantilla')
@section('titulo')
    The Tech Academy
@endsection
@section('cabecera')
    The Tech Academy
@endsection
<style>

.box {
  display: flex;
  align-items: center;
  justify-content: center;
}

.box div {
  width: 100px;
  height: 100px;
  
}
</style>
@section('contenido')

    <div class="box">
    <a href="{{route('alumnos.index')}}" class="btn btn-primary mr-4"> Gestionar Alumnos</a>
    <a href="{{route('modulos.index')}}" class="btn btn-primary mr-4"> Gestionar Módulos</a>
    </div>
@endsection
