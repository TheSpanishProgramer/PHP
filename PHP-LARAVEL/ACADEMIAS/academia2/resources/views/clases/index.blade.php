@extends('layout')

@section('content')

    <div class="panel panel-default col-md-10">

    <h3 class="panel-heading">Listado de clases </h3>
    

    <a href="{!! url('clases/create') !!}" class="btn btn-primary">Nuevo</a>

    {!! Form::open(['route' => 'clases.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right']) !!}
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Clase']) !!}
    
    {!! Form::submit('Buscar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

    
     <hr/>

    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Numero</th>
                <th>Acciones</th>
                <th>Datos</th>
            </tr>
        </thead>
            <tbody>
        @foreach($clases as $clase)
            <tr>
                <td>{{ $clase->name }}</td>
                <td>{{ $clase->numero }}</td>
                <td>
                    @if(Auth::user()->rol_id == '1')
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('clases.destroy', $clase->id))) !!}
                            {!! link_to_route('clases.edit', 'Editar', array($clase->id), array('class' => 'btn btn-info')) !!}
                            {!! Form::submit('Borrar', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
                    @else
                        {!! link_to_route('clases.edit', 'Editar', array($clase->id), array('class' => 'btn btn-info')) !!}
                    @endif
                </td>
                <td> {!! link_to_route('clases.show', 'Ver', array($clase->id), array('class' => 'btn btn-success')) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


    {!! $clases->render() !!}

    </div>


@endsection