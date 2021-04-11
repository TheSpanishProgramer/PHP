@extends('plantillas.plantilla')
@section('titulo')
    Academia s.a.
@endsection
@section('cabecera')
    Modulos DAW
@endsection
@section('contenido')
    @if ($text=Session::get('mensaje'))
        <p class="alert alert-danger my-3">{{$text}}</p>
    @endif
    <a href="{{route('modulos.create')}}" class="btn btn-info my-3"><i class="fa fa-plus"></i> Crear modulo</a>
    <table class="table table-striped table-dark text-center">
        <thead>
        <tr>
            <th scope="col">Detalles</th>
            <th scope="col" class="align-middle">Nombre</th>
            <th scope="col" class="align-middle">Horas</th>
            <th scope="col" class="align-middle">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($modulos as $modulo)
                <tr>
                    <th scope="row" class="align-middle">
                        <a href="{{route('modulos.show',$modulo)}}" class="btn btn-primary fa fa-book fa-2x"></a>
                    </th>
                    <td class="align-middle">{{$modulo->nombre}}</td>
                    <td class="align-middle">{{$modulo->horas}}</td>                   
                    <td class="align-middle">
                        <form class="form-inline" name="del" action="{{route('modulos.destroy',$modulo)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('modulos.edit',$modulo)}}" class="ml-2 fa fa-edit fa-2x btn btn-warning ml-auto"></a>
                            <button type="submit" onclick="return confirm('¿Borrar modulo?')" class="btn btn-danger fa fa-trash fa-2x ml-2 mr-auto"></button>                            
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$modulos->links()}}
@endsection