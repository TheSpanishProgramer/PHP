
@extends('layout')

@section('content')

    <h3>Nuevo Usuario</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach



    {!! Form::open(['route' => 'usuarios.store', 'class' => 'registerlogin']) !!}

    {!! csrf_field() !!}
    <div>
        <label for="">Nombre:</label><br/>
        {!! Form::input('text', 'name', old('name'), ['class' => 'form-control']) !!}
        @if($errors->first('name'))
            <span class="errors">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div>
        <label for="">Email:</label><br/>
        {!! Form::input('text', 'email', old('email'), ['class' => 'form-control']) !!}
        @if($errors->first('email'))
            <span class="errors">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div>
        <label for="">Contraseña:</label><br/>
        {!! Form::input('password', 'password', '',['class' => 'form-control']) !!}
        @if($errors->first('password'))
            <span class="errors">{{ $errors->first('password') }}</span>
        @endif
    </div>

    <div>
        <label for="">Repetir Contraseña:</label><br/>
        {!! Form::input('password', 'password_confirmation', '',['class' => 'form-control']) !!}
        @if($errors->first('password_confirmation'))
            <span class="errors">{{ $errors->first('password_confirmation') }}</span>
        @endif
    </div>


    <div>
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection