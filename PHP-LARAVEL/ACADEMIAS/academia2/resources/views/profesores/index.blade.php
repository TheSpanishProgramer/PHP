@extends('layout')

@section('content')

    <div class="panel panel-default col-md-10">

    <h3 class="panel-heading">Listado de Profesores </h3>
    

    <a href="{!! url('profesores/create') !!}" class="btn btn-primary">Nuevo</a>

    {!! Form::open(['route' => 'profesores.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right']) !!}
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del profesor']) !!}

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
        @foreach($profesores as $profesor)
            <tr>
                <td>{{ $profesor->name }}</td>
                <td>{{ $profesor->apellidos }}</td>
                <td>{{ $profesor->dni }}</td>
                <td>
                    @if(Auth::user()->rol_id == '1')
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('profesores.destroy', $profesor->id))) !!}
                            {!! link_to_route('profesores.edit', 'Editar', array($profesor->id), array('class' => 'btn btn-info')) !!}
                            {!! Form::submit('Borrar', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
                    @else
                        {!! link_to_route('profesores.edit', 'Editar', array($profesor->id), array('class' => 'btn btn-info')) !!}
                    @endif
                </td>
                <td> {!! link_to_route('profesores.show', 'Ver', array($profesor->id), array('class' => 'btn btn-success')) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


    </div>

    {!! $profesores->render() !!}

@endsection