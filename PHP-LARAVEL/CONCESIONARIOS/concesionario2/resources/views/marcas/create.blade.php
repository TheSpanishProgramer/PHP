@extends('plantillas.plantilla')
@section('titulo')
Crear marca
@endsection
@section('cabecera')
Crear marca
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
<form name="c" method='POST' action="{{route('marcas.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Nombre" name='nombre' required>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Pais" name='pais' required>
        </div>
        <div class="col">
            <b>Imagen</b><input type='file' name='logo' accept="image/*" style="display:inline" class="ml-2">
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col">
            <input type='submit' value='Guardar' class='btn btn-success mr-3'>
            <input type='reset' value='Limpiar' class='btn btn-warning mr-3'>
            <a href={{route('marcas.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>
  </form>
@endsection
