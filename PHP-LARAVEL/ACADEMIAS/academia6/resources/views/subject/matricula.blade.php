@extends('layouts.layout')

@section('meta-title')
    Matriculación
@endsection

@section('content')

    <div class="container">

        <h3>Necesitas una clave para poder entrar en la asignatura</h3>

            <div class="matricula margen-arriba">

                <form action="{{ route('subject.matricular', $subject) }}" method="POST">

                    {{ csrf_field() }}

                    <div class="row form-group {{ isset($fallo) ? 'has-errors' : '' }}">

                        <label class="control-label col-md-2" for="matricula">Clave: </label>

                        <input type="password" name="matricula" class="form-control col-md-6" placeholder="clave de la asignatura" id="matricula">

                    </div>

                    {!! $errors->first('matricula', '<p><span class="help-block text-danger">:message</span></p>') !!}

                    <div class="row form-group">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>

                </form>

            </div>
    </div>

@endsection