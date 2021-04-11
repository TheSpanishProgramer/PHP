@extends('plantillas.plantilla')
@section('titulo')
    Editar artículo
@endsection
@section('cabecera')
    Modificar artículo
@endsection
@section('contenido')
    <form name="update" method='POST' action="{{route('articulos.update', $articulo)}}" enctype="multipart/form-data" class="mt-5">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label class="mt-1 mr-1 font-weight-bold">Nombre: </label>
            <div class="col">
                <input type="text" class="form-control" value='{{$articulo->nombre}}' name='nombre' required>
            </div>
            <label class="mt-1 mx-2 font-weight-bold">Precio: </label>
            <div class="col">
                <input type="text" class="form-control" value='{{$articulo->precio}}' name='precio' required>
            </div>
            <div class="col">
                <select name='categoria' class="form-control">
                    @foreach($tipos as $tipo)
                        @if($tipo==$articulo->categoria)
                            <option selected>{{$tipo}}</option>
                        @else
                            <option>{{$tipo}}</option>
                        @endif
                    @endforeach
              </select>
            </div>
        </div>
        <div class="form-row mt-3 ml-3">
            <label class="mt-1 mr-1 font-weight-bold">Stock: </label>
            <div class="col">
                <input type="text" class="form-control" value='{{$articulo->stock}}' name='stock' required>
            </div>
            <div class="col">
                Imágen&nbsp;<input type='file' name='imagen' accept="image/*">
            </div>
        </div>
        <div class="form-row container ml-5 mt-3">
            <div class="col">
                <input type='submit' value='Modificar' class='btn btn-success mr-3'>
                <a href={{route('articulos.index')}} class='btn btn-info'>Volver</a>
            </div>
        </div>
    </form>
@endsection
