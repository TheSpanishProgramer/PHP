@extends('layout')

@section('content')

    <div class="panel panel-default col-md-10">

    <h3 class="panel-heading">Listado de alumnos </h3>
    

    <a href="{!! url('alumnos/create') !!}" class="btn btn-primary">Nuevo</a>

    {!! Form::open(['route' => 'alumnos.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right']) !!}
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del alumno']) !!}

    {!! Form::select('active', array(
    '' => 'Actividad',
    '1' => 'Activos',
    '0' => 'No activos'
    ),null,['class' => 'form-control'])!!}
    
    {!! Form::submit('Buscar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

    
     <hr/>

    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Acciones</th>
                <th>Datos</th>

            </tr>
        </thead>
            <tbody>
        @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->name }}</td>
                <td>{{ $alumno->apellidos }}</td>
                <td>{{ $alumno->dni }}</td>
                <td>
                    @if(Auth::user()->rol_id == '1')
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('alumnos.destroy', $alumno->id))) !!}
                            {!! link_to_route('alumnos.edit', 'Editar', array($alumno->id), array('class' => 'btn btn-info')) !!}
                            {!! Form::submit('Borrar', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
                    @else
                        {!! link_to_route('alumnos.edit', 'Editar', array($alumno->id), array('class' => 'btn btn-info')) !!}
                    @endif
                </td>
                <td> {!! link_to_route('alumnos.show', 'Ver', array($alumno->id), array('class' => 'btn btn-success')) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


    </div>

    {!! $alumnos->render() !!}

@endsection