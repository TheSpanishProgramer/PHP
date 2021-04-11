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
<form name="search" action="{{route('vendedors.index')}}" method="GET" class="form-inline float-right">
        
  <i class="fa fa-search ml-2 mr-2" aria-hidden="true"></i>           
  Vendedores con venta de:
  <select name="articulo_id" onchange="this.form.submit()">
          <option value="%">Todos...</option>
          @foreach ($articulos as $item)
          @if ($item->id== $request->articulo_id)
              <option value="{{$item->id}}"  selected>{{$item->nombre}}</option>
            @else
              <option value="{{$item->id}}" >{{$item->nombre}}</option>
          @endif
          @endforeach    
  </select>
  Filtrar por:
    <select name="filtro" onchange="this.form.submit()">
            <option value="%">Todos...</option>
            @if ($request->filtro== 'ventas')
            <option value="ventas" selected>Vend. con mas ventas</option>
            @else
            <option value="ventas">Vend. con mas ventas</option>
            @endif
            @if ($request->filtro== 'ingresos')
            <option value="ingresos" selected>Más ingresos generados</option>
            @else
            <option value="ingresos" >Más ingresos generados</option>    
            @endif     
               
    </select>
  <input type="submit" value="Buscar" class="btn btn-info ml-2">
    </form>
<a href="{{route('vendedors.create')}}" class="btn btn-info " ><i class="fa fa-plus"></i> Crear Vendedor</a>
<a href="{{route('vendedors.fventas')}}" class="btn btn-info " ><i class="fa fa-plus"></i> Gestionar ventas</a>

<table class="table table-dark mt-3">
        <thead>
          <tr>
            <th scope="col" class="align-middle">Detalles</th>
            <th scope="col" class="align-middle">Apellidos, Nombre</th>
            <th scope="col" class="align-middle">Mail</th>
            <th scope="col" class="align-middle">Imagen</th>
            <th scope="col" class="align-middle">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($vendedors as $vendedor)
            <tr>
            <th scope="row">
                <a href="{{route('vendedors.show', $vendedor)}}" style="text-decoration:none"><i class="fa-2x fa fa-address-card"></i></a>
            </th>
            <td class="align-middle">{{$vendedor->nombre.", ".$vendedor->apellido}}</td>
            <td class="align-middle">{{$vendedor->mail}}</td>
                <td class="align-middle">
                <img src="{{asset($vendedor->imagen)}}" width="90px" height="90px" class="rounded-circle">
                </td>
                <td class="align-middle">
                <form class="form-inline" action="{{route('vendedors.destroy', $vendedor)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Desea borrar vendedor?')" class="fa fa-trash btn btn-danger"></button>
                <a href="{{route('vendedors.edit', $vendedor)}}" class="ml-2 fa fa-edit fa-2x"></a>
                </form>
                </td>
            </tr>
            @endforeach
          
          
        </tbody>
      </table>
      <a href="{{route('index')}}" class="btn btn-success float-right">Volver al Index</a>
      {{$vendedors->appends(Request::except('page'))->links()}}
@endsection