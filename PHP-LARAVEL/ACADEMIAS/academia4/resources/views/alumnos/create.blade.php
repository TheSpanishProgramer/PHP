@extends('plantillas.plantilla')
@section('titulo')
    Crear Alumno
@endsection
@section('cabecera')
Nuevo Alumno
@endsection
@section('contenido')
<div class="container mt-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<form name="crear" action="{{route('alumnos.store')}}" method="POST">
    @csrf
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Apellido"  name="apellido" required>
          </div>
          
        </div>
        <div class="row mt-3">
                <div class="col">
                  <input type="email" class="form-control" placeholder="Email" name="email"  required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Dirección"  name="direccion">
                </div>        
                <div class="col">
                    <input type="text" class="form-control" placeholder="Teléfono"  name="telefono">
                  </div>       
              </div>
                  <div class="row mt-3">
                        <div class="col">
                            <input type="submit" class="btn btn-info normal" value="crear">
                            <input type="reset" class="btn btn-danger normal">
                        <a href="{{route('alumnos.index')}}" class="btn btn-success">Volver</a>
                        </div>
                                    
                      </div>
      </form>
@endsection