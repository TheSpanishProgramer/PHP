@extends('layout')
  @section('style')
    <link rel="stylesheet" href="assets/css/main-.css" />
    {!!Html::style('assets/css/main-.css')!!}
  @endsection
  @section('content')
  <section id="one">
    <div class="inner">
      <span class="image">
        <img src="/upload/estudiantes/fotos/{{$user->profile->foto}}" alt="Foto del estudiante" width="100" height="100" />
      </span>

      <span class="image">
        <a href="/upload/estudiantes/eps/{{$user->profile->epsFile}}" target="_blank">
          <img src="/images/eps.png" alt="eps del estudiante" width="100" height="100" />
        </a>
      </span>
      <span class="image">
        <a href="/upload/estudiantes/doc/{{$user->profile->docFile}}" target="_blank">
          <img src="/images/doc.png" alt="Documento de identidad del estudiante" width="100" height="100" />
        </a>      </span>
      <span class="image">
        <a href="/upload/estudiantes/sisben/{{$user->profile->sisbenFile}}" target="_blank">
          <img src="/images/sisben.png" alt="sisben del estudiante" width="100" height="100" />
        </a>      </span>
      <header class="major">
        <h2> Actulizando a: {{$user->nombre}}
        </h2>
      </header>
      <p>
        {!!Form::model($user->profile,['route'=>['admin.datos.update',$user->profile,$user->id],'method'=>'PATCH','enctype'=>'multipart/form-data'])!!}

          @include('estudiantes.partials.fieldsDatos')
          
      {!! Form::close() !!}
      </p>
    </div>
  </section>


  @endsection
