@extends('plantillas.plantilla1')
@section('titulo')
    miLibreria
@endsection
@section('encabezado')
    Libros S.A.
@endsection
@section('contenido')
<a href="{{route("libros.create")}}" class="btn btn-success my-3">Nuevo Libro</a>
<table class="table table-dark table-hover">
    <thead>
        <tr>
          <th scope="col">Código</th>
          <th scope="col">Titulo</th>
          <th scope="col">ISBN</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($libros as $miLibro)
          <tr>
            <td>{{$miLibro->id}}</td>
            <td>{{$miLibro->titulo}}</td>
            <td>{{$miLibro->isbn}}</td>
            <td>#</td>
          </tr>
          @endforeach
      </tbody>
  </table>
  {{$libros->links('pagination::bootstrap-4')}}
@endsection
