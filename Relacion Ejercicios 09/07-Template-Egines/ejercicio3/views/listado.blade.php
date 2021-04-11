<!doctype html>
<html>
<head>
    <title>Ejercicio 3</title>
    <meta charset="utf-8">
</head>
<body>
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
</body>
</html>


