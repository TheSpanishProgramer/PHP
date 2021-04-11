@extends('layout')

@section('content')

    <h3>Nueva Clase</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    {!! Form::open(['route' => 'clases.store','class' => 'registerlogin']) !!}
    <div>
        <label for="">Nombre:</label><br/>
        {!! Form::input('text', 'name', old('name'), ['class' => 'form-control']) !!}
        @if($errors->first('name'))
            <span class="errors">{{ $errors->first('name') }}</span>
        @endif
    </div>

     <div>
        <label for="">Numero:</label><br/>
        {!! Form::input('integer', 'numero', old('numero'), ['class' => 'form-control']) !!}
        @if($errors->first('numero'))
            <span class="errors">{{ $errors->first('numero') }}</span>
        @endif
    </div>

    <div>
        <label for="">Asignatura:</label><br/>
        @foreach($asignaturas as $asignatura)
            {{ $asignatura->name }}
            {!! Form::radio("asignatura", "$asignatura->id") !!}
        @endforeach
    </div>

    <div>
        <label for="">Profesor:</label><br/>

        <select name="profesor" class="form-control">

            @foreach ($profesores as $profesor)

                <option value="{{ $profesor->id }}"> {{ $profesor->name }}</option>

            @endforeach
    </div>

    

    <div>
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}
@endsection