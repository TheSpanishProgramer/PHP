@extends('plantillas.main')
@section('titulo')
    Almezone S.L.
@endsection
@section('cabecera')
    <h1 class="text-center">Vendedor</h1>
@endsection
@section('contenido')
    <div class="text-center">
        <img src="{{asset($vendedore->foto)}}" class="mt-2"><br>
        <h3 class="font-weight-bold mt-3">{{$vendedore->nombre.' '.$vendedore->apellidos}}</h3>
        <select name="articulo_id" class="mr-3 mt-4">
            @foreach ($articulos as $articulo)
                <option value="{{$articulo->id}}">{{$articulo->nombre}}</option>
            @endforeach
        </select>
        <input type="number" name="cantidad" placeholder="Cantidad"><br>
    </div>
    <div class="text-center mt-5">
        <form action="#" name="venta" method="post">
            @csrf
            @method('PUT')
            <input type="button" value="Realizar venta" class="btn btn-success mr-2">
            <a href="{{route('vendedores.index')}}" class="btn btn-primary"><i class="fas fa-undo"></i></a>
        </form>
    </div>
@endsection
