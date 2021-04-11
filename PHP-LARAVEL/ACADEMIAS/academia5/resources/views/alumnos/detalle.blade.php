@extends('plantillas.plantilla')
@section('titulo')
    Detalles alumno
@endsection
@section('cabecera')
    Detalle alumnos
@endsection
@section('contenido')
    @if ($text=Session::get('mensaje'))
        <p class="alert alert-info my-3">{{$text}}</p>
    @endif
    <span class="clearfix"></span>
    <div class="card text-white bg-info mt-5 mx-auto" style="max-width: 48rem;">
        <div class="card-header text-center"><b>{{($alumno->nombre)}}</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <h5 class="card-title text-center">Código: {{($alumno->id)}}</h5>
            <p class="card-text">
                <div class="float-right"><img src="{{asset($alumno->logo)}}" width="160px" heght="160px" class="rounded-circle"></div>
                <p><b>Nombre:</b> {{$alumno->nombre.", ".$alumno->apellidos}}</p>
                <p><b>Mail:</b> {{$alumno->mail}}</p>
                <p>
                    <b>Modulos:</b>
                    <ul>
                        @foreach ($alumno->modulos as $modulo)
                            <li>{{$modulo->nombre." (".$modulo->pivot->nota.")"}}</li>
                        @endforeach
                    </ul>                
                </p>
                <p>Nota media: {{$alumno->notaMedia()}}</p>
            </p>
            <a href="{{route('alumnos.index')}}" class="float-right mt-3 btn btn-success">Volver</a>
            <a href="{{route('alumnos.fmatricula',$alumno)}}" class="float-right btn btn-warning mr-2 mt-3">Matricular alumno</a>
            <a href="{{route('alumnos.fcalificar',$alumno)}}" class="float-right btn btn-danger mr-2 mt-3">Calificar alumno</a>
        </div>
    </div>
@endsection