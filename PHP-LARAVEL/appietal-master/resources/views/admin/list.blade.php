@extends('layout')
  @section('style')
    <link rel="stylesheet" href="assets/css/main-.css" />
    {!!Html::style('assets/css/main-.css')!!}
  @endsection
  @section('content')
          <section id="one">
            <div class="inner">
                  <p>
                    @include('admin.partials.search')
                </p>
            </div>
         </section>
         
          <section id="one">
            <div class="inner">
              <header class="major">
                <h2>  @if($criterio=='no aprobado')
                    <h1> Listado de Aspirantes no Aprobados</h1>
                  @elseif ($criterio=='aprobado')
                  <h1> Listado de Aspirantes Aprobados </h1>
                  @elseif ($criterio=='aspirante')
                  <h1> Listado de Aspirantes pre-matriculados</h1>
                  @elseif ($criterio=='pendiente')
                  <h1> Listado de Aspirantes pendientes</h1>
                  @endif
                </h2>
              </header>
              <p>
                @include('admin.partials.table')
              </p>
            </div>
          </section>



  @endsection
