
@extends('layout')

@section('content')

    <h3>Editar Alumno</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach


    {!! Form::open(['route' => ['alumnos.update',$alumno->id],'method' => 'PUT', 'class' => 'registerlogin']) !!}
    {!! Form::input('hidden', 'id', $alumno->id) !!}
    <div>
        <label for="">Nombre:</label><br/>
        {!! Form::input('text', 'name', $alumno->name, ['class' => 'form-control']) !!}
        @if($errors->first('name'))
            <span class="errors">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div>
        <label for="">Apellidos:</label><br/>
        {!! Form::input('text', 'apellidos', $alumno->apellidos, ['class' => 'form-control']) !!}
        @if($errors->first('apellidos'))
            <span class="errors">{{ $errors->first('apellidos') }}</span>
        @endif
    </div>

    <div>
        <label for="">DNI:</label><br/>
        {!! Form::input('text', 'dni', $alumno->dni, ['class' => 'form-control']) !!}
        @if($errors->first('dni'))
            <span class="errors">{{ $errors->first('dni') }}</span>
        @endif
    </div>

    <div>
        <label for="">Codigo Postal:</label><br/>
        {!! Form::input('text', 'cp', $alumno->cp, ['class' => 'form-control']) !!}
        @if($errors->first('cp'))
            <span class="errors">{{ $errors->first('cp') }}</span>
        @endif
    </div>

    <div>
        <label for="">Poblacion:</label><br/>
        {!! Form::input('text', 'poblacion', $alumno->poblacion, ['class' => 'form-control']) !!}
        @if($errors->first('poblacion'))
            <span class="errors">{{ $errors->first('poblacion') }}</span>
        @endif
    </div>

    <div>
        <label for="">Provincia:</label><br/>
        {!! Form::input('text', 'provincia', $alumno->provincia, ['class' => 'form-control']) !!}
        @if($errors->first('provincia'))
            <span class="errors">{{ $errors->first('provincia') }}</span>
        @endif
    </div>

     <div>
        <label for="">Telefono:</label><br/>
        {!! Form::input('text', 'tfijo', $alumno->tfijo, ['class' => 'form-control']) !!}
        @if($errors->first('tfijo'))
            <span class="errors">{{ $errors->first('tfijo') }}</span>
        @endif
    </div>

    <div>
        <label for="">Movil:</label><br/>
        {!! Form::input('text', 'movil', $alumno->tfijo, ['class' => 'form-control']) !!}
        @if($errors->first('movil'))
            <span class="errors">{{ $errors->first('movil') }}</span>
        @endif
    </div>

    <div>
        <label for="">Tutor:</label><br/>
        {!! Form::input('text', 'tutor', $alumno->tutor, ['class' => 'form-control']) !!}
        @if($errors->first('tutor'))
            <span class="errors">{{ $errors->first('tutor') }}</span>
        @endif
    </div>

    <div>
        <label for="">Activo:</label><br/>
        {!! Form::select('active', array(
            '0' => 'No',
            '1' => 'Si',
        ),$alumno->active ) !!}
    </div>

    <div>
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection