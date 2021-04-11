@extends("layouts/app")

@section("content")

@include("cabecera")
<table border="1">
    <tr>
        <td>Marca</td>
        <td>Modelo</td>
        <td>Tipo</td>
        <td>Precio</td>
        <td>Detalle</td>

    </tr>
    @foreach($listado_zapatillas as $zapatilla)
    <tr>
        <td>{{ $zapatilla->getMarca() }}</td>
        <td>{{ $zapatilla->getModelo() }}</td>
        <td>{{ $zapatilla->getTipo() }}</td>
        <td>{{ $zapatilla->getPrecio() }}</td>
        <td><a href="index.php?accion=detalle&id={{ $zapatilla->getId() }}">Ver detalle</a></td>
    </tr>
    @endforeach
</table>

@endsection

