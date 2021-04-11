
@extends('layout')

@section('content')

    <h3>Nuevo Alumno</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach


    {!! Form::open(['route' => 'alumnos.store', 'class' => 'registerlogin']) !!}
    <div>
        <label for="">Nombre:</label><br/>
        {!! Form::input('text', 'name', old('name'), ['class' => 'form-control']) !!}
        @if($errors->first('name'))
            <span class="errors">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div>
        <label for="">Apellidos:</label><br/>
        {!! Form::input('text', 'apellidos', old('apellidos'), ['class' => 'form-control']) !!}
        @if($errors->first('apellidos'))
            <span class="errors">{{ $errors->first('apellidos') }}</span>
        @endif
    </div>

    <div>
        <label for="">DNI:</label><br/>
        {!! Form::input('text', 'dni', old('dni'), ['class' => 'form-control']) !!}
        @if($errors->first('dni'))
            <span class="errors">{{ $errors->first('dni') }}</span>
        @endif
    </div>

    <div>
        <label for="">Codigo Postal:</label><br/>
        {!! Form::input('text', 'cp', old('cp'), ['class' => 'form-control']) !!}
        @if($errors->first('cp'))
            <span class="errors">{{ $errors->first('cp') }}</span>
        @endif
    </div>

    <div>
        <label for="">Poblacion:</label><br/>
        {!! Form::input('text', 'poblacion', old('poblacion'), ['class' => 'form-control']) !!}
        @if($errors->first('poblacion'))
            <span class="errors">{{ $errors->first('poblacion') }}</span>
        @endif
    </div>

    <div>
        <label for="">Provincia:</label><br/>
        {!! Form::input('text', 'provincia', old('provincia'), ['class' => 'form-control']) !!}
        @if($errors->first('provincia'))
            <span class="errors">{{ $errors->first('provincia') }}</span>
        @endif
    </div>

     <div>
        <label for="">Telefono:</label><br/>
        {!! Form::input('text', 'tfijo', old('tfijo'), ['class' => 'form-control']) !!}
        @if($errors->first('tfijo'))
            <span class="errors">{{ $errors->first('tfijo') }}</span>
        @endif
    </div>

    <div>
        <label for="">Movil:</label><br/>
        {!! Form::input('text', 'movil', old('movil'), ['class' => 'form-control']) !!}
        @if($errors->first('movil'))
            <span class="errors">{{ $errors->first('movil') }}</span>
        @endif
    </div>

    <div>
        <label for="">Tutor:</label><br/>
        {!! Form::input('text', 'tutor', old('tutor'), ['class' => 'form-control']) !!}
        @if($errors->first('tutor'))
            <span class="errors">{{ $errors->first('tutor') }}</span>
        @endif
    </div>

    <div>
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection