@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Dashboard</span>

                <h1>Academia Los Vencedores</h1>
                <p>Seleccione una opción de la izquierda.</p>

                <div class="center-align">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo de la academia" height="280" style="max-width: 85%;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
