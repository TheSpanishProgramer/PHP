@extends('plantillas.plantilla')
@section('titulo')
    Detalles de Vendedores
@endsection
@section('cabecera')
    Detalles de {{$vendedor->nombre}}
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-info my-3">{{$texto}}</p>    
@endif
<span class="clearfix"></span>
<div class="card text-white bg-info mt-5 mx-auto" style="max-width: 48rem;">
    <div class="card-header text-center"><b>{{($vendedor->nombre)}}</b></div>
    <div class="card-body" style="font-size: 1.1em">
        <h5 class="card-title text-center">{{($vendedor->id)}}</h5>
        <p class="card-text">
        <div class="float-right"><img src="{{asset($vendedor->imagen)}}" width="160px" heght="160px" class="rounded-circle"></div>
        <p><b>Nombre: </b> {{$vendedor->nombre.', '.$vendedor->apellido}}</p>
        <p><b>Dirección: </b> {{$vendedor->direccion}}</p>
        <p><b>Teléfono: </b> {{$vendedor->telefono}}</p>
        <p><b>Mail: </b> {{$vendedor->mail}}</p>
        </p>
        
         <div>
            <a href="{{route('vendedors.fventas')}}" class="float-right btn btn-success ml-3">Realizar venta</a>
            <a href="{{route('vendedors.index')}}" class="float-right btn btn-success ml-3">Volver</a>          
    </div>
    </div>
   
    
</div>



@endsection