@extends('plantillas.plantilla1')
@section('titulo')
miLibreria
@endsection
@section('encabezado')
Detalle Libro ({{$libro->id}})
@endsection
@section('contenido')
<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-6 p-4">
        @php echo  DNS1D::getBarcodeHTML($libro->isbn, 'EAN13',2,92, 'black', true) @endphp
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title">{{$libro->titulo}}</h5>
          <p class="card-text">{{$libro->descripcion}}</p>
          <p class="card-text"><small class="text-muted">Creado: {{$libro->created_at}}</small></p>
          <p class="card-text"><small class="text-muted">Actualizado: {{$libro->updated_at}}</small></p>
        </div>
      </div>
    </div>
  </div>
  <div class="my-4">
    <a href="{{route('libros.index')}}" class="btn btn-success">Inicio</a>

  </div>
@endsection
