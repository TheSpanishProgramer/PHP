@extends('plantillas.plantilla')
@section('titulo')
    Artículos
@endsection
@section('cabecera')
    Articulos Disponibles
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>    
@endif
<form name="search" action="{{route('articulos.index')}}" method="GET" class="form-inline float-right">
        
    <i class="fa fa-search ml-2 mr-2" aria-hidden="true"></i>           
    Articulos vendidos por:
    <select name="vendedor_id" onchange="this.form.submit()">
            <option value="%">Todos...</option>
            @foreach ($vendedors as $item)
            @if ($item->id== $request->vendedor_id)
                <option value="{{$item->id}}"  selected>{{$item->nombre}}</option>
              @else
                <option value="{{$item->id}}" >{{$item->nombre}}</option>
            @endif
            @endforeach    
    </select> 
    
    <input type="submit" value="Buscar" class="btn btn-info ml-2">
      </form>
<a href="{{route('articulos.create')}}" class="btn btn-success mb-3">Nuevo articulo</a>

<table class="table table-dark mt-3">
    <thead>
      <tr >
        <th scope="col">Detalles</th>
        <th scope="col">Nombre</th>
        <th scope="col">Categoria</th>
        <th scope="col">Imagen</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $articulo)
            <tr >
                <th class="align-middle" scope="row"><a href="{{route('articulos.show', $articulo)}}" class="btn btn-info">detalles</a></th>
                <td class="align-middle">{{$articulo->nombre}}</td>
                <td class="align-middle">{{$articulo->categoria->nombre}}</td>                
                <td class="align-middle"><img src="{{asset($articulo->imagen)}}" width="90px" height="90px" class="rounded-circle"></td>
                <td class="align-middle">
                    <form name="borrar" action="{{route('articulos.destroy', $articulo)}}" method="POST" style="white-space: nowrap">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('articulos.edit', $articulo)}}" class="btn btn-warning normal">Editar</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea borrar el articulo?')">Borrar</button>
                                
                    </form>
                </td>
            </tr>
        @endforeach
      
    </tbody>
  </table>
  <a href="{{route('index')}}" class="btn btn-success float-right">Volver al Index</a>
  {{$articulos->appends(Request::except('page'))->links()}}
@endsection