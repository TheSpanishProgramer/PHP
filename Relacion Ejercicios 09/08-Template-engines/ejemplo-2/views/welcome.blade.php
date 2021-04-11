@extends('layouts.app')

@section('content')
    <h1>Listado de personas</h1>
    <ul>
    @foreach ($personas as $persona)
        <ul>
            <li>Nombre: {{ $persona->getNombre() }}</li>
            <li>Profesión: {{ $persona->getProfesion() }}</li>
            <li>Edad: {{ $persona->getEdad() }}</li>
        </ul>
    @endforeach
    </ul>
@endsection

<!-- /views/layouts/app.blade.php -->

<!-- Stored in/views/child.blade.php -->









