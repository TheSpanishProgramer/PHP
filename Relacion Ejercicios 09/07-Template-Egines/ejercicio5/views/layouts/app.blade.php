<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    @yield('custom-scripts')
</head>
<body>
<div>
    <div class="contenido-principal">
        <h1>Ejercicio 5 (layouts)</h1>
        @yield('content')
    </div>
    <div class="barra-lateral">
        @yield('barra-lateral')
    </div>


</div>
</body>
</html>
