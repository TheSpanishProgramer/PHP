@extends('plantillas.plantilla')
@section('titulo')
    Articulos
@endsection
@section('cabecera')
    Artículos disponibles
@endsection
@section('contenido')
    @if($texto=Session::get('mensaje'))
        <p class="alert alert-warning my-3">{{$texto}}</p>
    @endif
    <a href="{{route('articulos.create')}}" class="btn btn-success mb-3">Añadir artículo</a>
    <form name="search" action="{{route('articulos.index')}}" method="get" class="form-inline float-right">
        <select name='categoria' class="form-control" onchange="this.form.submit()">
            <option value="%">Todos</option>
            @foreach($tipos as $tipo)
                @if($tipo==$request->categoria)
                    <option selected>{{$tipo}}</option>
                @else
                    <option>{{$tipo}}</option>
                @endif
            @endforeach
        </select>

        <select name="precio" class="form-control ml-2" onchange="this.form.submit()">
            @foreach ($precios as $precio=>$valor)
                @if ($precio==$request->precio)
                    <option value="{{$precio}}" selected>{{$valor}}</option>
                @else
                <option value="{{$precio}}">{{$valor}}</option>
                @endif
            @endforeach
        </select>
    </form>
    <table class="table table-striped table-dark text-center">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
              </tr>
        </thead>
        <tbody>
            <tbody>
                @foreach ($articulos as $articulo)
                <tr>
                    <td>{{$articulo->nombre}}</td>
                    <td>{{$articulo->categoria}}</td>
                    <td>{{$articulo->precio.' €'}}</td>
                    <td>{{$articulo->stock}}</td>
                    <td><img src="{{asset($articulo->imagen)}}" width="40px" height='40px'></td>
                    <td>
                        <form name="borrar" method='post' action='{{route('articulos.destroy', $articulo)}}'>
                            @csrf
                            @method('DELETE')
                            <a href='{{route('articulos.edit', $articulo)}}' class="btn btn-warning mr-2">Editar</a>
                            <button type='submit' class="btn btn-danger" onclick="return confirm('¿Borrar artículo?')">
                              Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
      </table>
      {{$articulos->appends(Request::except('page'))->links()}}
@endsection
