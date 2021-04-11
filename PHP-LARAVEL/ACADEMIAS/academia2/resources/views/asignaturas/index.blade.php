@extends('layout')

@section('content')


    <div class="panel panel-default col-md-10">

    <h3 class="panel-heading">Listado de Asignaturas </h3>

    <a href="{!! url('asignaturas/create') !!}" class="btn btn-primary">Nuevo</a>

    {!! Form::open(['route' => 'asignaturas.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right']) !!}
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la asignatura']) !!}
    
    {!! Form::submit('Buscar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

    <hr/>


    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Creado</th>
                <th>Modificado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($asignaturas as $asignatura)
            <tr>
                <td>{{ $asignatura->name }}</td>
                <td>{{ $asignatura->precio }}</td>
                <td>{{ $asignatura->created_at->diffForHumans() }}</td>
                <td>{{ $asignatura->updated_at->diffForHumans() }}</td>
                <td>
                    @if(Auth::user()->rol_id == '1')
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('asignaturas.destroy', $asignatura->id))) !!}
                            {!! link_to_route('asignaturas.edit', 'Editar', array($asignatura->id), array('class' => 'btn btn-info')) !!}
                            {!! Form::submit('Borrar', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
                    @else
                        {!! link_to_route('asignaturas.edit', 'Editar', array($asignatura->id), array('class' => 'btn btn-info')) !!}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $asignaturas->render() !!}

@endsection