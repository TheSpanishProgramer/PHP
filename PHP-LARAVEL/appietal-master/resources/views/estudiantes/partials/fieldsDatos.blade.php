<div class="row uniform">
  <div class="12u$">
      @if(Auth::user()->admin())
      {!!Form::select('aprobado', ['' => 'Seleccione estado del aspirante', 'aprobado' => 'aprobado',
      'no aprobado'=>'no aprobado','pendiente'=>'pendiente'])!!}
      @endif
  </div>
      <!-- datos personales -->
  <div class="6u 12u$(xsmall)">
    <label class="control-label" for="inputSuccess4">Documento de Identificación</label>
    {!! Form::text('numDoc',null,['class'=>'form-control','placeholder'=>'Digite su numero de identificación'])!!}
  </div>
  <div class="6u$ 12u$(xsmall)">
    <label class="control-label" for="inputSuccess4">Tipo Documento </label>
    {!!Form::select('tipoDoc', ['' => 'Seleccione tipo de documento', 'Tarjeta de identidad' => 'Tarjeta de identidad',
    'Registro civil'=>'Registro civil','Cedula'=>'Cedula'])!!}
  </div>

  <div class="6u 12u$(xsmall)">
    <label class="control-label" for="inputSuccess4">Lugar de Nacimiento</label>
    {!! Form::text('lugarNa',null,['class'=>'form-control','placeholder'=>'Lugar de Nacimiento'])!!}

  </div>
  <div class="6u$ 12u$(xsmall)">
    <label class="control-label" for="inputSuccess4">Fecha de nacimiento</label>
    {!! Form::date('feNa',null,['class'=>'form-control','placeholder'=>'Fecha de Nacimiento'])!!}

  </div>

  <div class="6u 12u$(xsmall)">
    <label class="control-label" for="inputSuccess4">Dirección</label>
    {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Digite su dirección'])!!}

  </div>
  <div class="6u$ 12u$(xsmall)">
      <label class="control-label" for="inputSuccess4">Telefono</label>
      {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Digite su telefono'])!!}

  </div>

  <!-- datos generales -->
  <div class="4u 12u$(small)">
      <label class="control-label" for="inputSuccess4">Sexo</label>
      {!!Form::select('sexo', ['' => 'Seleccione el sexo', 'm' => 'Masculino',
      'f'=>'femenino'])!!}

  </div>

  <div class="4u 12u$(small)">
      <label class="control-label" for="inputSuccess4">Sisben</label>
    {!! Form::text('sisben',null,['class'=>'form-control','placeholder'=>'Digite su puntaje del sisben'])!!}


  </div>

  <div class="4u 12u$(small)">
    <label class="control-label" for="inputSuccess4">Estracto</label>
    {!! Form::text('estracto',null,['class'=>'form-control','placeholder'=>'Digite su estracto '])!!}

<!-- Break -->

  </div>
  <div class="6u 12u$(xsmall)">
    <label class="control-label" for="inputSuccess4">Seguridad Social</label>
    {!! Form::text('seguridadS',null,['class'=>'form-control','placeholder'=>' Digite su seguridad social (opcional)'])!!}

  </div>
<div class="6u 12u$(xsmall)">
    <label class="control-label" for="inputSuccess4">Grupo sanguineo</label>
    {!!Form::select('rh', ['' => 'Seleccione su grupo Sanguineo', 'A+' => 'A+',
    'A-'=>'A-','O+'=>'O+','O-'=>'O-','AB+'=>'AB+','AB-'=>'AB-'])!!}

  </div>
  <!-- Break -->


  <div class="6u$ 12u$(xsmall)">
    <label class="control-label" for="inputSuccess4">Procedencia</label>
    <input type="text" name="procedencia" id="demo-email" value="" placeholder="Digite la Procedencia" />
  </div>

  <!-- Break -->
  @if(Auth::user()->estudiante())
  <div class="6u 12u$(small)">
    <input type="checkbox" id="demo-copy" name="desplazado" value="1">
    <label for="demo-copy">Desplazado</label>
  </div>

  <div class="6u$ 12u$(small)">
    <input type="checkbox"  name="madreC" value="2">
    <label for="demo-human">Madre Cabeza de familia </label>
  </div>
  @endif
  <!-- Break -->

  <div class="12u$">
    <label class="control-label" for="inputSuccess4">Lugar de desplazamiento</label>
    {!! Form::text('lugarDeplazado',null,['class'=>'form-control','placeholder'=>'Digite el lugar de desplazamiento'])!!}

  </div>
  <!-- Break -->
  @if(Auth::user()->admin())
  <div class="12u$">
    <label class="control-label" for="inputSuccess4">Observaciones</label>
    {!! Form::textarea('observaciones',null,['class'=>'form-control','placeholder'=>'Escriba sus observaciones'])!!}
  </div>
 @endif
  @if(Auth::user()->estudiante())
 <div class="3u 12u$(small)">
      <input type="file" name="foto" accept="image/*">
        <label for="demo-human"> Foto </label>
  </div>


   <div class="3u 12u$(small)">
     <input type="file" name="sisbenFile">
     <label for="demo-human"> Sisben (formato PDF)</label>
   </div>

   <div class="3u 12u$(small)">
      <input type="file" name="epsFile" >
      <label for="demo-human"> EPS (formato PDF)</label>
   </div>

   <div class="3u 12u$(small)">
      <input type="file" name="docFile" >
      <label for="demo-human"> Documento de identidad formato PDF)</label>
   </div>
 @endif
  <!-- datos adicionales -->
  @if(Auth::user()->admin())
    @include('admin.partials.fieldsAdicional')
  @endif
  <!-- Break -->
    @include('admin.partials.bottom')

</div>
