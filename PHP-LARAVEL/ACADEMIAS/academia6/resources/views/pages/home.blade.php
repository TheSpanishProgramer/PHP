@extends('layouts.layout')

@section('content')


    <header class="masthead text-center">
        <div class="container">
            <h1 class="text-uppercase text-primary mb-0">Academia</h1>
            <hr class="star-dark mb-5">
            <h2 class="font-weight-light text-secondary mb-0">Primaria - ESO - Bachiller - PAU - Universidad</h2>
            <h2 class="font-weight-light text-secondary mb-0">Online</h2>
            @if(auth()->check() && auth()->user()->hasRole('invitado'))

                <h3 class="text-danger">Los usuarios con el rol invitado solo pueden ver los cursos y asignaturas.</h3>
                <h5 class="text-danger">Es el administrador el que verifica los usuarios.</h5>

            @endif

        </div>
    </header>

@endsection