@extends('plantillas.main')
@section('titulo')
    Almezone S.L.
@endsection
@section('cabecera')
    <h1 class="text-center">Vendedores</h1>
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
    <a href="{{route('vendedores.create')}}" class="ml-4 my-1"> <i class="far fa-plus-square fa-1x btn btn-success"></i></a>
    <a href="#" class="ml-3 my-1"><i class="fas fa-star fa-1x btn btn-dark mr-1"></i></a>Mejor vendedor
    <table class="table table-borderless mt-5">
        <thead>
        <tr>
            <th scope="col" class="text-center"></th>
            <th scope="col" class="text-center">Nombre</th>
            <th scope="col" class="text-center">Apellidos</th>
            <th scope="col" class="text-center">Teléfono</th>
            <th scope="col" class="text-center">E-mail</th>
            <th scope="col" class="text-center">Sueldo</th>
            <th scope="col" class="text-center">Foto</th>
            <th scope="col" class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($vendedores as $vendedor)
                <tr>
                    <td class="text-center align-middle"><a href="{{route('vendedores.show',$vendedor)}}" class="text-white btn btn-secondary"><i class="far fa-eye fa-1x"></i></a></td>
                    <td class="text-center align-middle">{{$vendedor->nombre}}</td>
                    <td class="text-center align-middle">{{$vendedor->apellidos}}</td>
                    <td class="text-center align-middle">{{$vendedor->telefono}}</td>
                    <td class="text-center align-middle">{{$vendedor->email}}</td>
                    <td class="text-center align-middle">{{$vendedor->sueldo}}</td>
                    <td class="text-center align-middle"><img src="{{asset($vendedor->foto)}}" width="60vw" height="60vh" class="img-fluid rounded-circle"></td>
                    <td class="text-center align-middle">
                        <form name="delete" action="{{route('vendedores.destroy',$vendedor)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar al empleado?')"><i class="fas fa-trash-alt fa-1x"></i></button>
                            <a href="{{route('vendedores.edit',$vendedor)}}" class="btn btn-warning"><i class="far fa-edit fa-1x"></i></a>
                        </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    {{$vendedores->links()}}
    <div class="text-center my-2">
        <a href="{{route('inicio')}}"><i class="btn fas fa-home fa-2x"></i></a>
    </div>
@endsection
