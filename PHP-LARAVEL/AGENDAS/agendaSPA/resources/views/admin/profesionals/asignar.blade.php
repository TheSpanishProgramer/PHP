@extends('admin.layout')
@section('title','Asignar Turnos ')
@section('main-content')
<div class="box box-warning">
<div class="box-header with-border">
  <h3 class="box-title">Asignar turnos a profesionales</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
  <form role="form">
    <!-- select -->
    <div class="form-group">
      <label>Seleccion un profesional de la lista </label>
      <select class="form-control">
        <option>option 1</option>
        <option>option 2</option>
        <option>option 3</option>
        <option>option 4</option>
        <option>option 5</option>
      </select>
    </div>
    <!-- Select multiple-->
    <div class="form-group">
      <label>Seleccione uno o mas horarios de la lista</label>
      <select multiple="" class="form-control">
        <option>option 1</option>
        <option>option 2</option>
        <option>option 3</option>
        <option>option 4</option>
        <option>option 5</option>
      </select>
    </div>
  </form>
   <a href="#" class="btn btn-primary btn-flat">Guardar Horario</a>
</div>
<!-- /.box-body -->
</div>
@endsection()