<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .image {
            height: 120px;
        }
        ul.side-nav.fixed li.logo a:hover, ul.side-nav.fixed li.logo a.active {
            background-color: #ffffff;
        }
        @section('padding-left-nav')
        header,main,footer{padding-left:300px;}
        @show
    </style>
    <link rel="stylesheet" href="{{ asset('css/ghpages-materialize.css') }}">
    @yield('links')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<header>
    @if (Auth::check())
        <ul id="nav-mobile" class="side-nav fixed" style="transform: translateX(0%);">
            <li class="center-align">
                <p>Los Vencedores</p>
                <img class="image" src="{{ asset('images/escudo.png') }}" alt="Los Vencedores">
            </li>

            <li><a class="waves-effect" href="/alumnos">Alumno<i class="material-icons">assignment_ind</i></a></li>
            <li><a class="waves-effect" href="/docentes">Docente<i class="material-icons">person_pin</i></a></li>
            <li><a class="waves-effect" href="/cursos">Curso<i class="material-icons">library_books</i></a></li>
            <li><a class="waves-effect" href="/matricula">Matricula<i class="material-icons">mode_edit</i></a></li>
            <li><a class="waves-effect" href="/notas">Notas<i class="material-icons">web</i></a></li>
            <li><a class="waves-effect" href="/reportes">Gráficos<i class="material-icons">equalizer</i></a></li>

            <li class="divider"></li>

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    Salir<i class="material-icons">vpn_key</i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>


        <a href="#" data-activates="nav-mobile" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
    @endif
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

    <!-- Scripts -->    
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
    <script>
        $(function () {
            $(".button-collapse").sideNav();
        });
    </script>
    @yield('scripts')
</body>
</html>
