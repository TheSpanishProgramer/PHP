@extends('layouts.master')

@section('content')    

    <div class="row" style="margin:15px 0 10px 0">
        <div class="col-sm-4">
            <img src="{{$pelicula->poster}}" style="height:400px"/>
        </div>
        <div class="col-sm-8">
            <h2 style="min-height:45px;margin:5px 0 10px 0">
                {{$pelicula->title}}
            </h2>
            <p style="min-height:45px;margin:5px 0 10px 0">
                <strong>Año: </strong>
                {{$pelicula->year}}
            </p>
            <p style="min-height:45px;margin:5px 0 10px 0">
                <strong>Director: </strong>
                {{$pelicula->director}}
            </p>
            <p style="min-height:45px;margin:5px 0 10px 0">
                <strong>Resumen: </strong>
                {{$pelicula->synopsis}}
            </p>
            <p style="min-height:45px;margin:5px 0 10px 0">
                    <strong>Estado: </strong>
                    @if( $pelicula->rented == TRUE )
                        Película actualmente alquilada<br>
                    @else
                        Película disponible<br>
                        <button type="button" class="btn btn-primary">Alquilar película</button>
                    @endif

                    <a class="btn btn-warning" href="{{ url('/catalog/edit/' . $pelicula->id ) }}">
                        <i class="fa fa-pie-chart"></i>
                        Editar pelicula
                    </a>

                    <a class="btn btn-light" href="{{ url('/catalog') }}">
                        <i class="fa fa-pie-chart"></i>
                        Volver a catalogo
                    </a>
                </p>
        </div>
    </div>

@stop
