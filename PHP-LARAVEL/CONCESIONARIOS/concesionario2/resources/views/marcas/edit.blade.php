@extends('plantillas.plantilla')
@section('titulo')Editar marca
@endsection
@section('cabecera')
Modificar marca
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
<form name="c" method='POST' action="{{route('marcas.update', $marca)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" value='{{$marca->nombre}}' name='nombre' required>
        </div>
        <div class="col">
            <input type="text" class="form-control" value='{{$marca->pais}}' name='modelo' required>
        </div>
        <img src="{{asset($marca->logo)}}" width="40vw" height="40vh" class="rounded-circle mr-3">
        <div class="col">
            <b>Imagen</b><input type='file' name='logo' accept="image/*" style="display:inline" class="ml-2">
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col">
            <input type='submit' value='Modificar' class='btn btn-success mr-3'>
            <a href={{route('marcas.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>

  </form>
@endsection
