@extends('admin.layout')
@section('title','Editar Servicio')
@section('main-content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Editar Servicio o Procedimiento</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!!Form::open(['route' => ['servicios.update',$servicios], 'method' => 'PUT'])!!}
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('name',' Nombre del Servicio')!!}
        {!! Form::text('name', $servicios->name,['class' => 'form-control', 'placeholder' => 'Nombre del Servicio'], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('costo','Costo del Servicio')!!}
        {!! Form::number('costo', $servicios->costo,['class' => 'form-control', 'placeholder' => '100,000.00', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('sedes','Sedes donde se prestará el servicio')!!}
        <!-- Acá pasamos dos varibale una nos mostrará todas las sedes y la siguiente nos muestras las sedes que ya estan seleccionadas-->
        {!! Form::select('sedes[]', $sedes, $mysedes,['class' => 'form-control', 'multiple', 'required'])!!}
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('Actualizar Registro', ['class'=>'btn btn-primary'])!!}
    </div>  
  {!! Form::close()!!}
</div>
@endsection()