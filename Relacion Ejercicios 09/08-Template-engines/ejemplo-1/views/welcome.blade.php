@extends('layouts.app')

@section('content')
    <h1>Hola Blade!</h1>
@endsection

<h1>Lista de pasteles</h1>
@foreach($pasteles as $pastel)
    <h2>{{ $pastel->nombre }}</h2>
@endforeach