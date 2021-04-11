@extends('plantillas.plantilla')
@section('titulo')
    Academia s.a.
@endsection
@section('cabecera')
    Editar modulo
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
    <div class="card bg-secondary">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form name="a" action="{{route('modulos.update',$modulo)}}" method="POST">
                @csrf   
                @method('PUT')              
                <div class="form-row">                    
                    <div class="col">
                        <label for="nom" class="col-form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{$modulo->nombre}}" required>                        
                    </div>                    
                    <div class="col">
                        <label for="ape" class="col-form-label">Horas</label>
                        <input type="text" class="form-control" name="horas" value="{{$modulo->horas}}" required>
                    </div>                   
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="submit" value="Editar" class="btn btn-success">
                        <input type="reset" value="Limpiar" class="btn btn-warning">
                        <a href="{{route('modulos.index')}}" class="btn btn-info">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection