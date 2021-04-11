@extends('plantillas.plantilla')
@section('titulo')
    Bazar Shangai
@endsection
@section('cabecera')
    Gestion de vendedores
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>    
@endif
<a href="{{route('vendedors.index')}}" class="btn btn-success float-right">Volver</a>
<a href="{{route('vendedors.rventas')}}" class="btn btn-info " ><i class="fa fa-plus"></i> Realizar venta</a>


<table class="table table-dark mt-3">
        <thead>
          <tr>
            <th scope="col" class="align-middle">Vendedor</th>
            <th scope="col" class="align-middle">Cantidad</th>
            <th scope="col" class="align-middle">Cliente</th>
            <th scope="col" class="align-middle">Articulo</th>
            <th scope="col" class="align-middle">Total (€)</th>
            <th scope="col" class="align-middle">Fecha de venta</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($vendedors as $vendedor)
                @foreach ($vendedor->articulos()->get() as $item)
                <tr>
                    <td class="align-middle">{{$vendedor->nombre.", ".$vendedor->apellido}}</td>
                    <td class="align-middle">{{$item->pivot->cantidad}}</td>
                    <td class="align-middle">{{$item->pivot->cliente}}</td>
                    <td class="align-middle"><img src="{{asset($item->imagen)}}" width="90px" height="90px" class="rounded-circle"></td>
                    <td class="align-middle">{{$item->pivot->pvp.' €'}}</td>
                    <td class="align-middle">{{$item->pivot->created_at}}</td>
                    </tr>
                @endforeach
            
            @endforeach
          
          
        </tbody>
      </table>
     

@endsection