<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App web IETAL</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	@yield('style')





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




</body>
</html>
