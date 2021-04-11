@extends('admin.layout')
@section('title','Modificar Cliente')
@section('main-content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Modificar Registro de CLiente </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!!Form::open(['route' => ['clientes.update',$cliente], 'method' => 'PUT' ])!!}
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('name',' Nombre')!!}
        {!! Form::text('name', $cliente->name, ['class' => 'form-control', 'placeholder' => 'Nombre del Cliente'], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('cedula',' Numero de Identificacion')!!}
        {!! Form::text('cedula', $cliente->cedula, ['class' => 'form-control','maxlength'=>'10','placeholder'=>'CC / CE 1.987.899','readonly'=>'true'],'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('email','Correo Electronico')!!}
        {!! Form::email('email', $cliente->email, ['class' => 'form-control','placeholder' => 'example@gmail.com', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('telefono','Numero telefonico')!!}
        {!! Form::text('telefono', $cliente->telefono,['class'=>'form-control','placeholder'=>'3005555555', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('address','Dirección')!!}
        {!! Form::text('address', $cliente->address, ['class' => 'form-control', 'placeholder' => 'Escriba la dirección', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('sede_id','Sede')!!}
        {!! Form::select('sede_id',$sede,$cliente->sede_id,['class'=>'form-control','placeholder' => 'Selecione una Opcion'])!!}
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('Actualizar Registro', ['class'=>'btn btn-primary'])!!}
    </div>
  </form>
  {!! Form::close()!!}
</div>

@endsection
