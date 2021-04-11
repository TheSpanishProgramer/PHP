<!doctype html>
<html>
<head>
    <title>Ejercicio 2</title>
    <meta charset="utf-8">
</head>
<body>
    <table border="1">
        <tr>
            <td>Marca</td>
            <td>{{ $zapatilla->getMarca() }}</td>
        </tr>
        <tr>
            <td>Modelo</td>
            <td>{{ $zapatilla->getModelo() }}</td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td>{{ $zapatilla->getTipo() }}</td>
        </tr>
        <tr>
            <td>Precio</td>
            <td>{{ $zapatilla->getPrecio() }}</td>
        </tr>
    </table>
</body>
</html>


