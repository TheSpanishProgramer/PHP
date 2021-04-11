@extends('plantillas.main')
@section('titulo')
    Almezone S.L.
@endsection
@section('cabecera')
    <h1 class="text-center">Productos</h1>
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
    @if ($text=Session::get('mensaje'))
        <p class="alert alert-success my-1">{{$text}}</p>
    @endif
    <div>
        <form action="{{route('articulos.index')}}" method="get">
            <select name="categoria_id" class="float-right mr-5" onchange="this.form.submit()">
                <option value="%">Todos</option>
                @foreach ($categorias as $categoria)
                    @if ($categoria->id==$request->categoria_id)
                        <option value="{{$categoria->id}}" selected>{{$categoria->nombre}}</option>
                    @else
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </form>
    </div>
    <a href="{{route('articulos.create')}}" class="btn btn-success ml-4 my-1"> <i class="far fa-plus-square fa-1x"></i></a>
    <table class="table table-borderless mt-5">
        <thead>
        <tr>
            <th scope="col" class="text-center"></th>
            <th scope="col" class="text-center">Nombre</th>
            <th scope="col" class="text-center">Modelo</th>
            <th scope="col" class="text-center">Precio</th>
            <th scope="col" class="text-center">Stock</th>
            <th scope="col" class="text-center">Categoria</th>
            <th scope="col" class="text-center">Imagen</th>
            <th scope="col" class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td class="text-center align-middle"><a href="{{route('articulos.show',$articulo)}}" class="text-white btn btn-secondary"><i class="far fa-eye fa-1x"></i></a></td>
                    <td class="text-center align-middle">{{$articulo->nombre}}</td>
                    <td class="text-center align-middle">{{$articulo->modelo}}</td>
                    <td class="text-center align-middle">{{$articulo->precio}}</td>
                    <td class="text-center align-middle">{{$articulo->stock}}</td>
                    <td class="text-center align-middle">{{$articulo->categoria->nombre}}</td>
                    <td class="text-center align-middle"><img src="{{asset($articulo->foto)}}" width="90vw" height="90vh" class="img-fluid rounded-circle"></td>
                    <td class="text-center align-middle">
                        <form name="delete" action="{{route('articulos.destroy',$articulo)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar el producto?')"><i class="fas fa-trash-alt fa-1x"></i></button>
                            <a href="{{route('articulos.edit',$articulo)}}" class="btn btn-warning"><i class="far fa-edit fa-1x"></i></a>
                        </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    {{$articulos->appends(Request::except('page'))->links()}}
    <div class="text-center my-2">
        <a href="{{route('inicio')}}"><i class="btn fas fa-home fa-2x"></i></a>
    </div>
@endsection
