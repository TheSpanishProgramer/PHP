
@extends('layout')
@section('style')
<link rel="stylesheet" href="assets/css/main.css" />
{!!Html::style('assets/css/main.css')!!}
@endsection
@section('content')

<!-- Main -->
 <!-- <section id="banner">
  <div class="inner">

      <h1>Hola, {{Auth::User()->nombre}}</h1>
      </header>
      <div class="content">
        @if(Auth::user()->admin())

          Slide
          @else
            @if(Auth::user()->prematriculado)

                <p>Hemos recibido su información exitosamente, Verifique su estado</p>
                @else
                <p>Gracias por utilizar nuestro sistema de Pre-Matricual IETAL</p>

            @endif


              <ul class="actions">
                @if(Auth::user()->prematriculado )

                <li><a href="{{url('verificar-estado')}}" class="button next scrolly">Verficar Estado </a></li>
                @else
                <li><a href="{{route('datos.create')}}" class="button next scrolly">Pre-matricularme</a></li>

               @endif
       @endif
        </ul>
      </div>
    </div>
  </section> -->


  <section id="banner" class="major">
    <div class="inner">
      <header class="major">
        <h1>Bienvenido, {{Auth::User()->nombre}}</h1>
      </header>
      @if(Auth::user()->admin())
          <div class="content">
            <p>Sistema de pre-matricula de la Institución Tecnica Alfonsol
              lopez, desde aqui podra gestionar la información de los aspirantes.</p>
              <ul class="actions">
                <li><a href="#one" class="button next scrolly">Empezar -> Go it</a></li>
              </ul>
              @else
                @if(Auth::user()->prematriculado)

                    <p>Hemos recibido su información exitosamente, Verifique su estado</p>
                @else
                    <p>Gracias por utilizar nuestro sistema de Pre-Matricual IETAL</p>
                @endif

                @if(Auth::user()->prematriculado )
                <ul class="actions">
                  <li><a href="{{url('verificar-estado')}}" class="button next scrolly">Verficar Estado </a></li>
                </ul>
                @else
                <ul class="actions">
                  <li><a href="{{route('datos.create')}}" class="button next scrolly">Pre-matricularme</a></li>
                </ul>
               @endif
            <!--  -->
          </div>
      @endif
    </div>
  </section>

  @if(Auth::user()->admin())
  <div id="main">

    <!-- One -->
      <section id="one" class="tiles">
        <article>
          <span class="image">
            <img src="images/pic01.jpg" alt="" />
          </span>
          <header class="major">
            <h3><a href="{{url('listAspirantes')}}" class="link">Listado de Aspirantes</a></h3>
            <p>Muestra todas la personas que se han registrado en la aplicacion web</p>
          </header>
        </article>
        <article>
          <span class="image">
            <img src="images/pic02.jpg" alt="" />
          </span>
          <header class="major">
            <h3><a href="{{url('listAprobados')}}" class="link">Listado de Aprobados</a></h3>
            <p>En este espacio, el sistema le mostrara todos los aspirantes que ya han sido aprobado
            para entrar a IETAL</p>
          </header>
        </article>
        <article>
          <span class="image">
            <img src="images/pic03.jpg" alt="" />
          </span>
          <header class="major">
            <h3><a href="{{url('listNoAprobados')}}" class="link">Listado de No aprobado</a></h3>
            <p>Lista, de aquellos aspirantes que no han sido aprobado.</p>
          </header>
        </article>
        <article>
          <span class="image">
            <img src="images/pic04.jpg" alt="" />
          </span>
          <header class="major">
            <h3><a href="{{url('listPendientes')}}" class="link">Listado de pendientes</a></h3>
            <p>Lista de aquellos aspirantes que esta pendiente por verificar su información</p>
          </header>
        </article>
 @endif

@endsection
