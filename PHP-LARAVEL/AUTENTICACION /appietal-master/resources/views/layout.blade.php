<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App web IETAL</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<!-- <link rel="stylesheet" href="assets/css/main.css" />
	{!!Html::style('assets/css/main.css')!!} -->
	@yield('style')
	<!-- Latest compiled and minified CSS -->

	<!-- Fonts -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body>
	<div id="wrapper">

		<!-- Header -->
			<header id="header" class="alt">
				<a href="{{url('home')}}" class="logo"><strong>Pre-matricula </strong> <span>APP WEB IETAL</span></a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Menu -->
			<nav id="menu">
				<ul class="links">

					@if (Auth::guest())

            <li><a href="{{url('/')}}">Inicio</a></li>
						<li><a href="{{route('login')}}">Crear Cuenta</a></li>
					@elseif(Auth::user()->admin())
					  <li><a href="{{url('home')}}">Inicio</a></li>
							<li><a href="{{url('listAspirantes')}}">Listado de Aspirantes</a></li>
						<li><a href="{{url('listAprobados')}}">Listado de aprobados</a></li>
						<li><a href="{{url('listNoAprobados')}}">Listado de no aprobados</a></li>
						<li><a href="{{url('listPendientes')}}">Listado de Pendientes</a></li>

					@elseif(Auth::user()->estudiante())
					  <li><a href="{{url('home')}}">Inicio</a></li>
					@endif
				</ul>
				<ul class="actions vertical">
					@if (Auth::guest())
						<li><p><a  class="button fit" href="{{route('login')}}" role="button">Iniciar Sesión</a></p></li>
						@else
						<li><a href="{{route('cerrar')}}" class="button fit">Cerrar sesión</a></li>
				 @endif
				</ul>
			</nav>

		<!-- Banner -->
		@yield('content')
		<!-- <section id="banner">
			<div class="inner">
	      -->
						<!-- <h1>Hola, Juan Alberto Posada Giraldo</h1>
					</header>
					<div class="content">
						<p>Gracias por utilizar nuestro sistema de Pre-Matricual IETAL</p>
						<ul class="actions">
							<li><a href="primerPaso.html" class="button next scrolly">Pre-matricularme</a></li>
						</ul>
					</div> -->
				<!-- </div>
			</section> -->


			<!-- Footer -->
				<footer id="footer">
					<div class="inner">


					<ul class="copyright">
							<li>&copy; APP WEB</li><li> INSTITUTO EDUCATIVA TECNICO ALFONSO LOPEZ <li>
					</ul>
				</div>
			</footer>

	</div>



	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="assets/js/main.js"></script>
	@yield('scripts')
</body>
</html>
