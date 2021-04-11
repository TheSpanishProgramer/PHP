@extends('plantillas.plantilla')
@section('titulo')
    Academia s.a.
@endsection
@section('cabecera')
    Gestión de alumnos
@endsection
@section('contenido')
    @if ($text=Session::get('mensaje'))
        <p class="alert alert-danger my-3">{{$text}}</p>
    @endif
    <a href="{{route('alumnos.create')}}" class="btn btn-info my-3"><i class="fa fa-plus"></i> Crear alumno</a>
    <form name="modulos" action="{{route('alumnos.index')}}" method="get" class="form-inline float-right">
        <select name='categoria' class="form-control" onchange="this.form.submit()">
            @foreach ($modulos as $modulo)
                <option>{{$modulo->nombre}}</option>
            @endforeach
        </select>
    </form>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Detalles</th>
            <th scope="col" class="align-middle">Apellidos, Nombre</th>
            <th scope="col" class="align-middle">Mail</th>
            <th scope="col" class="align-middle">Imagen</th>
            <th scope="col" class="align-middle">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <th scope="row" class="align-middle">
                        <a href="{{route('alumnos.show',$alumno)}}" class="btn btn-success fa fa-address-card fa-2x"></a>
                    </th>
                    <td class="align-middle">{{$alumno->apellidos.", ".$alumno->nombre}}</td>
                    <td class="align-middle">{{$alumno->mail}}</td>
                    <td class="align-middle">
                        <img src="{{asset($alumno->logo)}}" width="60px" height="60px" class="img-fluid rounded-circle">
                    </td>
                    <td class="align-middle">
                        <form class="form-inline" name="del" action="{{route('alumnos.destroy',$alumno)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Borras alumno?')" class="btn btn-danger fa fa-trash fa-2x"></button>
                            <a href="{{route('alumnos.edit',$alumno)}}" class="ml-2 fa fa-edit fa-2x btn btn-warning"></a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$alumnos->links()}}
@endsection
