@extends('admin.layout')
@section('title','Crear Servicio')
@section('main-content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Crear Servicio o Procedimiento</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!!Form::open(['route' => 'servicios.store', 'method' => 'POST'])!!}
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('name',' Nombre del Servicio')!!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Servicio'], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('costo','Costo del Servicio')!!}
        {!! Form::number('costo', null, ['class' => 'form-control', 'placeholder' => '100,000.00', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('sede','Sedes donde se prestará el servicio')!!}
        {!! Form::select('sede[]', $sede, null,['class' => 'form-control', 'multiple', 'required'])!!}
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
    </div>  
  {!! Form::close()!!}
</div>
@endsection()