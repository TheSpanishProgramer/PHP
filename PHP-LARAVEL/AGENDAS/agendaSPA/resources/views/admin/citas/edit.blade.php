@extends('admin.layout')
@section('title','Gestion de citas ')
@section('main-content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!--Datos del profesional-->
      <!-- general form elements disabled -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Modificacion o cambio de estado de citas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!!Form::open(['route'=>['citas.update',$cita], 'method'=>'PUT'])!!}
          <div class="row">
            <!--Panel lado izquierdo-->
            <div class="col-md-6">
              <!-- select -->
              <div class="form-group">
                {!! Form::label('sede_id','Sede donde trabaja el profesional ')!!}
                <input type="text" name="sede_id" value="{{$cita->sede_id}}" hidden>
                {!! Form::text('sede',$sede->name,['class'=>'form-control','id'=>'sedes', 'readonly', 'required'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('servicio_id','Servicio a Realizar ')!!}
                <input type="text" name="servicio_id" value="{{$cita->servicio_id}}" hidden >
                {!!Form::text('servicio',$servicio->name,['class'=>'form-control','id'=>'servicios','readonly','required'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('profesional_id','Seleccione Profesional para el Servicio')!!}
                <input type="text" name="profesional_id" value="{{$cita->profesional_id}}" hidden>
                {!!Form::text('profesional', $profesional->name,['class'=>'form-control','id'=>'profesional','readonly','required'])!!}
              </div>
              <!-- DateTimePicker -->
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="reservadate">Dia</label>
                    <input type="date" class="form-control" name="reservadate" value="{{ $cita->reservadate}}" id="reserva-date" required>
                  </div>
                  <div class="col-md-6">
                    <!-- time Picker -->
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label for="reservatime">hora</label>
                        <div class="input-group">
                          <input type="text" name="reservatime" value="{{$cita->reservatime}}" id="reservatime" class="form-control timepicker" required >
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
                    </div>
                  </div>
                </div>
              </div>
              <!--Notificacion de si la cita esta disponible ne la hora seleccionada o no-->
              <div id="notificacion"></div>  
              <div class="form-group">
                {!! Form::label('status','Estado de la cita')!!}
                {!!Form::select('status',['' => 'Selecione una Opcion','Reservada' => 'Reservada','En Proceso' => 'En Proceso','FInalizada' => 'Finalizada','Cancelada' => 'Cancelada'],$cita->status,['class'=>'form-control','id'=>'profesional','required'])!!}
              </div>          
            </div>
            <!--Panel lado derecho-->
            <div class="col-md-6">
              <!--Select de Cliente-->
              <div class="form-group">
                {!! Form::label('cliente_id',' Datos del Cliente')!!}
                    <input type="text" name="cliente_id" value="{{$cita->cliente_id}}" hidden>
                {!! Form::text('cliente',$cliente->name,['class' => 'form-control','id'=>'cliente', 'readonly','required'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('notas','Observaciones')!!}
                {!! Form::textarea('notas',$cita->notas,['class'=>'form-control','id'=>'notas','required'])!!}
              </div>
              <div class="box-footer">
                {!! Form::submit('Modificar Registro', ['class'=>'btn btn-block btn-primary btn-flat', 'id'=>"btn-registrar"])!!}
                <!--button type="button" class="btn btn-block btn-info btn-flat" id="btn-registrar">Registrar Cita</button--> 
              </div>               
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->        
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection()