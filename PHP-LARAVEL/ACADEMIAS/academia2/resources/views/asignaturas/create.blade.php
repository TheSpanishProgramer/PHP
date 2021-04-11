@extends('layout')

@section('content')

    <h3>Nueva Asignatura</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    {!! Form::open(['route' => 'asignaturas.store','class' => 'registerlogin']) !!}
    <div>
        <label for="">Nombre:</label><br/>
        {!! Form::input('text', 'name', old('name'), ['class' => 'form-control']) !!}
        @if($errors->first('name'))
            <span class="errors">{{ $errors->first('name') }}</span>
        @endif
    </div>

     <div>
        <label for="">Precio:</label><br/>
        {!! Form::input('integer', 'precio', old('precio'), ['class' => 'form-control']) !!}
        @if($errors->first('precio'))
            <span class="errors">{{ $errors->first('precio') }}</span>
        @endif
    </div>

    <div>
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection