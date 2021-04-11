@extends('plantillas.main')
@section('titulo')
    Almezone S.L.
@endsection
@section('cabecera')
    <h1 class="text-center">Categorias</h1>
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
    <a href="{{route('categorias.create')}}" class="btn btn-success ml-4 my-1"> <i class="far fa-plus-square fa-1x"></i></a>
    <table class="table table-borderless mt-5">
        <thead>
        <tr>
            <th scope="col" class="text-center"></th>
            <th scope="col" class="text-center">Nombre</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td class="text-center align-middle">{{$categoria->nombre}}</td>
                    <td class="text-center align-middle">
                        <form name="delete" action="{{route('categorias.destroy',$categoria)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar la categoria?')"><i class="fas fa-trash-alt fa-1x"></i></button>
                            <a href="{{route('categorias.edit',$categoria)}}" class="btn btn-warning"><i class="far fa-edit fa-1x"></i></a>
                        </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    {{$categorias->appends(Request::except('page'))->links()}}
    <div class="text-center my-2">
        <a href="{{route('inicio')}}"><i class="btn fas fa-home fa-2x"></i></a>
    </div>
@endsection
