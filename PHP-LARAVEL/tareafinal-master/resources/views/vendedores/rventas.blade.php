@extends('plantillas.plantilla')
@section('titulo')
    Bazar Shangai
@endsection
@section('cabecera')
    Nueva venta
@endsection
@section('contenido')
@if ($texto=Session::get('error'))
<p class="alert alert-danger my-3">{{$texto}}</p>    
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $miError)
        <li>{{$miError}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card bg-secondary">
    <div class="card-header text-center ">Realizar Venta</div>
    <div class="card-body">
    <form action="{{route('vendedors.vender')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="col">
            <label for="nom" class="col-form-label">Vendedor</label>
            <select name="vendedor">
                @foreach ($vendedors as $item)
                <option value="{{$item->id}}">{{$item->nombre.", ".$item->apellido}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
                <label for="nom" class="col-form-label">Articulo</label>
                <select name="articulo">
                    @foreach ($articulos as $item)
                    <option value="{{$item->id}}">{{$item->nombre." (Stock:".$item->stock.")"}}</option>
                    @endforeach
                </select>
            </div>
    </div>
   
    <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" placeholder="Cantidad"  required>
            </div>
            <div class="col">
                    <label for="nom" class="col-form-label">Cliente</label>
                    <input type="text" name="cliente" class="form-control"  placeholder="Cliente"  required>
                </div>
    </div>

            <div class="form-row mt-3">
                <input type="submit" value="Vender" class="btn btn-success mr-3">
                <input type="reset" value="Limpiar" class="btn btn-danger mr-3">
            <a href="{{route('vendedors.fventas')}}" class="btn btn-info" >Volver</a>
                    
            </div>
    </form>
    </div>
</div>
@endsection