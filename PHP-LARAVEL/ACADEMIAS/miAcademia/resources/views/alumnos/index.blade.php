@extends('plantillas.plantilla1')
@section('titulo')
    Alumnos
@endsection
@section('cabecera')
    Alumnos de la Academia
@endsection
@section('contenido')
    {{-- Para que salga el mensaje --}}
    @if ($text = Session::get('mensaje'))
        <p class="bg-secondary text-white p-2 my-3">{{ $text }}</p>
    @endif
    {{-- Creamos el boton de crear --}}
    <a href="{{ route('alumnos.create') }}" class="btn btn-success mb-3">
        <i class="fa fa-plus"></i>Crear Alumno
    </a>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $item)
                <tr>
                    <th scope="row"><img src="{{ asset($item->imagen) }}" width="50rem" height="50rem"
                            class="rounded-circle"></th>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->apellidos }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>
                        <form action="{{ route('alumnos.destroy', $item) }}" method="post" class="form-inline">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('alumnos.edit', $item) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i>Modificar
                            </a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Borrar Alumno?')">
                                <i class="fa fa-trash"></i> Borrar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $alumnos->links() }}
@endsection
