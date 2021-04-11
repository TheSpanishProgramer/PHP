@extends('plantillas.plantilla')
@section('titulo')
    Bazar Shangai
@endsection
@section('cabecera')
    Categorias
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>    
@endif
<a href="{{route('categorias.create')}}" class="btn btn-success mb-3">Nueva categoria</a>

<table class="table table-bordered">
    <thead>
      <tr class="table-active">
        <th scope="col">Nombre</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
            <tr class="table-success">
                <td class="align-middle">{{$categoria->nombre}}</td>
                <td class="align-middle">
                    <form name="borrar" action="{{route('categorias.destroy', $categoria)}}" method="POST" style="white-space: nowrap">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('categorias.edit', $categoria)}}" class="btn btn-warning normal">Editar</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea borrar la categoria?')">Borrar</button>
                                
                    </form>
                </td>
            </tr>
        @endforeach
      
    </tbody>
  </table>
  <a href="{{route('index')}}" class="btn btn-success float-right">Volver al Index</a>
  {{$categorias->links()}}
@endsection