@extends('layout')

@section('content')

    <h3>Modificar Asignatura</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    {!! Form::open(['route' => ['clases.update', $clase->id], 'method' => 'PUT', 'class' => 'registerlogin']) !!}

    <div>
        <label for="">Nombre:</label><br/>
        {!! Form::input('text', 'name', $clase->name, ['class' => 'form-control']) !!}
        @if($errors->first('name'))
            <span class="errors">{{ $errors->first('name') }}</span>
        @endif
    </div>

     <div>
        <label for="">Numero:</label><br/>
        {!! Form::input('integer', 'numero', $clase->numero, ['class' => 'form-control']) !!}
        @if($errors->first('numero'))
            <span class="errors">{{ $errors->first('numero') }}</span>
        @endif
    </div>


    <div>
        <label for="">Asignatura:</label><br/>
        @foreach($asignaturas as $asignatura)
            @if($clase->asignatura_id == $asignatura->id)
                {{ $asignatura->name }}
                {!! Form::radio("asignatura", "$asignatura->id",true) !!}
            @else
                {{ $asignatura->name }}
                {!! Form::radio("asignatura", "$asignatura->id") !!}
            @endif
        @endforeach
    </div>

    <div>
        <label for="">Profesor:</label><br/>

        <select name="profesor" class="form-control">

            @foreach ($profesores as $profesor)
                @if($clase->profesor_id == $profesor->id)
                    <option value="{{ $profesor->id }}" selected="selected"> {{ $profesor->name }}</option>
                @else
                    <option value="{{ $profesor->id }}"> {{ $profesor->name }}</option>
                @endif
            @endforeach
            </select>
    </div>

    <div>
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection