@extends('admin.layout')
@section('title','Crear Turno')
@section('main-content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Crear Turno</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!!Form::open(['route' => 'turnos.store', 'method' => 'POST'])!!}
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('name',' Nombre del Turno')!!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Turno'], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('inicio','Hora de Inicio')!!}
        {!! Form::time('inicio', null, ['class' => 'form-control','required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('fin','Hora de Final')!!}
        {!! Form::time('fin', null, ['class' => 'form-control','required'])!!}
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
    </div>  
  {!! Form::close()!!}
</div>

@endsection()