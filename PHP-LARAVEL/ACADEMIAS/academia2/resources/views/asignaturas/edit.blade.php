@extends('layout')

@section('content')

    <h3>Modificar Asignatura</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    {!! Form::open(['route' => ['asignaturas.update', $asignatura->id], 'method' => 'PUT', 'class' => 'registerlogin']) !!}


    <div>
        <label for="">Nombre:</label><br/>
        {!! Form::input('text', 'name', $asignatura->name, ['class' => 'form-control']) !!}
        @if($errors->first('name'))
            <span class="errors">{{ $errors->first('name') }}</span>
        @endif
    </div>


    <div>
        <label for="">Precio:</label><br/>
        {!! Form::input('integer', 'precio', $asignatura->precio, ['class' => 'form-control']) !!}
        @if($errors->first('precio'))
            <span class="errors">{{ $errors->first('precio') }}</span>
        @endif
    </div>

    <div>
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection