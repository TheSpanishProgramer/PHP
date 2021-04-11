@extends('plantillas.plantilla1')
@section('titulo')
miLibreria
@endsection
@section('encabezado')
Libros S.A.
@endsection
@section('contenido')
@if($texto=Session::get('mensaje'))
    <!-- si existe la variable de sesion mensaje guarsdo su contenido en $texto y hago esto-->
    <p class="alert alert-success my-3 p-3">{{$texto}}</p>
@endif
<a href="{{route("libros.create")}}" class="btn btn-success my-3">Nuevo Libro</a>
<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">Detalle</th>
          <th scope="col">Titulo</th>
          <th scope="col">ISBN</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
          @foreach($libros as $miLibro)
        <tr>
          <td><a href="{{route('libros.show', $miLibro)}}" class="btn btn-info">Detalle</a></td>
          <td>{{$miLibro->titulo}}</td>
          <td>@php echo  DNS1D::getBarcodeHTML($miLibro->isbn, 'EAN13',2,42, 'black', true) @endphp</td>
          <td>
    <form name="borrar" class="form-inline" method="POST" action="{{route('libros.destroy', $miLibro)}}">
        @csrf
        @method("DELETE")
<a href="{{route('libros.edit', $miLibro)}}" class="btn btn-warning">Editar</a>
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Borrar Libro?')">Borrar Libro</button>

    </form>
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
  {{$libros->links('pagination::bootstrap-4')}}
@endsection
