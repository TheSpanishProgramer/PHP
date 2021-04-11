@extends('admin.layouts.layout')

@section('meta-title-header')

    Dashboard

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2>Usuario autenticado: {{ auth()->user()->name }}</h2>
            <h2>Rol: {{ auth()->user()->getRoleNames()[0] }}</h2>
            <h2><a href="{{ route('admin.user') }}">Usuarios</a> sin verificar: {{ $users }}</h2>
            <h2><a href="{{ route('admin.contact.index') }}">Mensajes</a> sin resolver: {{ $contacts }}</h2>
        </div>
    </div>

@endsection