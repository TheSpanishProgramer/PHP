@extends('plantillas.plantilla')
@section('titulo')
    Crear articulo
@endsection
@section('cabecera')
    Crear artículo
@endsection
@section('contenido')
<form name="c" method='POST' action="{{route('articulos.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <label class="mt-1 mr-1 font-weight-bold">Nombre: </label>
        <div class="col">
            <input type="text" class="form-control" name='nombre' required>
        </div>
        <label class="mt-1 mx-2 font-weight-bold">Precio: </label>
        <div class="col">
            <input type="number" class="form-control" name='precio' min="0" step="0.50" required>
        </div>
        <div class="col">
            <select name='categoria' class="form-control">
                @foreach($tipos as $tipo)
                   <option>{{$tipo}}</option>
                @endforeach
          </select>
        </div>
    </div>
    <div class="form-row mt-3 ml-3">
        <label class="mt-1 mr-1 font-weight-bold">Stock: </label>
        <div class="col">
            <input type="text" class="form-control" name='stock' required>
        </div>
        <div class="col">
            Imágen&nbsp;<input type='file' name='imagen' accept="image/*">
        </div>
    </div>
    <div class="form-row container ml-5 mt-3">
        <div class="col">
            <input type="submit" value="Guardar" class="btn btn-success">
            <a href={{route('articulos.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>
  </form>
@endsection
