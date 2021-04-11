@extends("layouts/app")

@section("content")

@include("cabecera")
<table border="1">
    <tr>
        <td>Marca</td>
        <td>Modelo</td>
        <td>Tipo</td>
        <td>Precio</td>

    </tr>
    @foreach($listado_zapatillas as $zapatilla)
    <tr>
        <td>{{ $zapatilla->getMarca() }}</td>
        <td>{{ $zapatilla->getModelo() }}</td>
        <td>{{ $zapatilla->getTipo() }}</td>
        <td>{{ $zapatilla->getPrecio() }}</td>
    </tr>
    @endforeach
</table>

@endsection

@section('barra-lateral')
    <ul>
        <li>Contacta al: 945010203</li>
    </ul>
@endsection

